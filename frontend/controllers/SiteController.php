<?php
namespace frontend\controllers;

use common\models\WebKategoriArtikel\WebKategoriArtikel;
use common\models\WebPerusahaan\WebPerusahaan;
use frontend\models\Dashboard\DashboardLowongan;
use frontend\models\Dashboard\DashboardLowonganSearch;
use frontend\models\Dashboard\DashboardUserPremium;
use frontend\models\LowonganSearch;
use frontend\models\ResendAktivasi;
use common\models\WebPelamar\WebPelamar;
use frontend\models\User\User;
use frontend\models\UserLamaran;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\controllers\UserController;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['index'] = true;
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->view->params['login'] = true;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $_SESSION['menu'] = 0;
            return $this->redirect(['dashboard/']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->view->params['about'] = true;
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionPost($kategori)
    {
        $this->view->params[$kategori] = true;
        if(WebKategoriArtikel::findOne($kategori) != null) {
            return $this->render('post', ['idKategori' => $kategori]);
        } else {
            return $this->render('404');
        }
    }

    public function actionDeveloper()
    {
        $this->view->params['developer'] = true;
        return $this->render('developer');
    }

    public function actionPostDetail($id)
    {
        $data = \common\models\WebArtikel\WebArtikel::findOne($id);
        if($data != null){
            $this->view->params[$data['artikelKategoriID']] = true;
            return $this->render('post-detail',['data' => $data]);
        } else {
            return $this->render('404');
        }
    }

    public function actionLowongan($kategori = null)
    {
        $this->view->params['lowongan'] = true;

        $searchModel = new LowonganSearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);
//        $provider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 5
//            ]
//        ]);
        return $this->render('lowongan',[
            'searchModel' => $searchModel,
            //'models' => $provider->getModels(),
            'provider' => $provider,
        ]);
    }

    public function actionLowonganDetail($id = false){
        $this->view->params['lowongan'] = true;
        if($id == false){
            return $this->goBack();
        }
        $model = \frontend\models\Dashboard\DashboardLowongan::find()->where(['lowonganStatus' => 'Aktif'])->andWhere(['lowonganID' => $id])->one();
        if($model != null) {
            return $this->render('lowongan-detail', ['model' => $model]);
        } else {
            return $this->goBack();
        }
    }

    public function actionLowonganLamar($id){
        $this->view->params['lowongan'] = true;
        if ($id == false) {
            return $this->goBack();
        }
        if(!Yii::$app->user->isGuest) {
            $model = \frontend\models\Dashboard\DashboardLowongan::find()->where(['lowonganStatus' => 'Aktif'])->andWhere(['lowonganID' => $id])->one();
            $model2 = new UserLamaran();
            if ($model != null) {
                $cekLamaran = \frontend\models\UserLamaran::find()->where(['lamaranLowonganID' => $id])->andWhere(['lamaranUserID' => Yii::$app->user->identity->userID])->andWhere(['lamaranStatus' => 'Pending Review'])->all();
                if ($cekLamaran != null) {
                    return $this->redirect(['site/lowongan-detail', 'id' => $id]);
                }
                if (date("Y-m-d") <= $model->lowonganValid && $model->lowonganDaftarOnline == 'Ya') {
                    if ($model2->load(Yii::$app->request->post())) {
                        $model2->lamaranLowonganID = $id;
                        if(Yii::$app->user->identity->role == 'alumni' || Yii::$app->user->identity->role == 'mahasiswa'){
                            $model2-> lamaranRekomendasi = 'Ya';
                        }
                        $model2->save();
                        return $this->redirect(['site/lowongan-detail', 'id' => $id]);
                    }
                    return $this->render('lowongan-lamar', [
                        'model' => $model,
                        'model2' => $model2,
                    ]);
                } else {
                    return $this->redirect(['site/lowongan-detail', 'id' => $id]);
                }
            } else {
                return $this->goBack();
            }
        } else {
            return $this->goBack();
        }
    }

    public function actionEvent()
    {
        $this->view->params['events'] = true;
        return $this->render('event');
    }

    public function actionRegister()
    {
        $this->view->params['register'] = true;
        if(Yii::$app->user->isGuest) {
            return $this->render('register_type');
        } else {
            $data = "Welcome back " . Yii::$app->user->identity->nama;
            return $this->render('dashboard', ['view' => 'index','data' => $data]);
        }
    }

    public function  actionRegisterForm($mode){
        $this->view->params['register'] = true;
        if(Yii::$app->user->isGuest) {
            if ($mode == 'one') {
                $model = new User();
                $model2 = new WebPerusahaan();
                $model3 = new DashboardUserPremium();
                if ($model->load(Yii::$app->request->post())) {

                    $model->token_aktivasi = md5("reg" . date('ymdhis') . "user");

                    $tokenAktivasi = $model->token_aktivasi;

                    Yii::$app->mailer->compose('mail-register', ['token' => $tokenAktivasi])
                        ->setFrom('arifkynpa@gmail.com', 'no-reply Admin')
                        ->setTo($model->email)
                        ->setSubject('[Activation Account]')
                        ->send();

                    $model->save();
                    $model2->load(Yii::$app->request->post());
                    $model2->perusahaanUserID = User::find()->where(['email' => $model->email])->one()['userID'];
                    $model2->save();
                    if ($model->role == "perusahaan-premium") {
                        $model3->load(Yii::$app->request->post());
                        $model3->userID = User::find()->where(['email' => $model->email])->one()['userID'];
                        $model3->save();
                    }

                    return $this->redirect(['register-success']);

                }
                return $this->render('register-perusahaan', ['model' => $model, 'model2' => $model2]);
            } else if ($mode == 'two') {
                $model = new User();
                $model2 = new WebPelamar();
                if ($model->load(Yii::$app->request->post())) {

                    $model->token_aktivasi = md5("reg" . date('ymdhis') . "user");

                    $tokenAktivasi = $model->token_aktivasi;

                    Yii::$app->mailer->compose('mail-register', ['token' => $tokenAktivasi])
                        ->setFrom('arifkynpa@gmail.com', 'no-reply Admin')
                        ->setTo($model->email)
                        ->setSubject('[Activation Account]')
                        ->send();

                    $model->save();
                    $model2->pelamarUserID = User::find()->where(['email' => $model->email])->one()['userID'];
                    $model2->pelamarStatus = 'Aktif';
                    $model2->save();

                    return $this->redirect(['register-success']);

                }
                return $this->render('register', ['model' => $model, 'model2' => $model2]);
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionRegisterSuccess()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('register_success');
    }

    public function actionConfirmEmail($token)
    {
        if($token != '') {
            $user = User::find()->where(['token_aktivasi' => $token, 'status' => 'Pending'])->one();
            if ($user != null) {
                $user->status = 'Aktif';
                $user->token_aktivasi = '';
                $user->save();
                return $this->render('register_success_activation');
            } else {
                return $this->render('register_failed_activation');
            }
        } else {
            return $this->render('register_failed_activation');
        }
    }
    public function actionResendConfirmEmail(){
        $model = new ResendAktivasi();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::find()->where(['email' => $model->email])->one();
            if($user != null){
                if($user['status'] == "Pending" && $user['token_aktivasi'] != null) {
                    $tokenAktivasi = $user['token_aktivasi'];
                    Yii::$app->mailer->compose('mail-register', ['token' => $tokenAktivasi])
                        ->setFrom('arifkynpa@gmail.com', 'no-reply Admin')
                        ->setTo($model->email)
                        ->setSubject('[Activation Account]')
                        ->send();
                    return $this->render('register_resend_activation', ['model' => $model, 'message' => 'true']);
                } else {
                    return $this->render('register_resend_activation', ['model' => $model, 'message' => 'aktif']);
                }
            } else {
                return $this->render('register_resend_activation',['model' => $model,'message' => 'false']);
            }
        }
        return $this->render('register_resend_activation',['model' => $model]);
    }

    public function actionForgot(){
        $model = new ResendAktivasi();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::find()->where(['email' => $model->email])->one();
            if($user != null){
                if($user['status'] == "Aktif" OR $user['status'] == "Reset Password") {
                    $password = md5($user->email."forgot");

                    Yii::$app->mailer->compose('mail-forgot', ['password' => $password])
                        ->setFrom('arifkynpa@gmail.com', 'no-reply Admin')
                        ->setTo($model->email)
                        ->setSubject('[Password Recovery]')
                        ->send();

                    $user->password = $password;
                    $user->save();

                    return $this->render('forgot_resend_password', ['model' => $model, 'message' => 'true']);
                } else if($user['status'] == "Pending"){
                    return $this->render('forgot_resend_password', ['model' => $model, 'message' => 'pending']);
                }
            } else {
                return $this->render('forgot_resend_password',['model' => $model,'message' => 'false']);
            }
        }
        return $this->render('forgot_resend_password',['model' => $model]);
    }

    public function actionRegisterGuide()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('register_guide');
    }
}
