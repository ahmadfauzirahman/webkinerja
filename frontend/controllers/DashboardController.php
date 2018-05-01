<?php
namespace frontend\controllers;

use common\models\WebPelamar\WebPelamar;
use Da\QrCode\Format\MeCardFormat;
use Da\QrCode\QrCode;
use frontend\models\Dashboard\DashboardUser;
use frontend\models\Dashboard\DashboardUserPremium;
use frontend\models\Dashboard\DashboardUserPremiumTransaksi;
use frontend\models\Dashboard\DashboardUserPremiumTransaksiSearch;
use frontend\models\User\DashboardPelamar;
use frontend\models\User\User;
use Yii;
use yii\base\InvalidParamException;
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
use yii\web\UploadedFile;

/**
 * Site controller
 */
class DashboardController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->layout = 'dashboard';
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
        $this->view->params['dashboard'] = true;


        if(!Yii::$app->user->isGuest) {

            if (Yii::$app->user->identity->role == 'perusahaan-premium' || Yii::$app->user->identity->role == 'perusahaan-non-premium') {

                return $this->render('index_perusahaan');

            } else {

                return $this->render('index');

            }
        } else {
            return $this->goHome();
        }
    }

    public function actionProfile(){
        $this->view->params['profile'] = true;
        if(!Yii::$app->user->isGuest) {

            $model = DashboardUser::findOne(Yii::$app->user->identity->userID);

            $current_image = $model->foto;
            if($model->load(Yii::$app->request->post())){
                $image = UploadedFile::getInstance($model, 'foto');
                if(!empty($image) && $image->size !== 0){
                    $image->saveAs(Yii::$app->basePath . "./../backend/web/foto/" . $model->userID.'.'.$image->extension);
                    $model->foto = $model->userID.'.'.$image->extension;
                } else {
                    $model->foto = $current_image;
                }
                $model->save();
                return $this->redirect(['dashboard/profile']);
            }
            return $this->render('profile');

        } else {
            return $this->goHome();
        }
    }


//    public function actionAkunPremiumKonfirmasi()
//
//    {
//        if(!Yii::$app->user->isGuest) {
//
//            $model = new DashboardUserPremiumTransaksi();
//            $image = UploadedFile::getInstance($model, 'userPremiumTransaksiBukti');
//            if ($model->load(Yii::$app->request->post())) {
//
//                $id = strtotime(date('Ymdhis'));
//                $image->saveAs(Yii::$app->basePath . "./../backend/web/buktitransfer/" . $id.'.'.$image->extension);
//                $model->userPremiumTransaksiBukti = $id.'.'.$image->extension;
//
//                $model->userPremiumID = 1;
//                $model->userID = Yii::$app->user->identity->userID;
//                $model->userPremiumTransaksiTglTransaksi= date('Y-m-d',strtotime($model->userPremiumTransaksiTglTransaksi));
//                $model->userPremiumTransaksiTglKonfirmasi = date('Y-m-d h:i:s');
//                $model->save();
//
//                return $this->redirect(['dashboard/akun-premium-konfirmasi']);
//            }
//            return $this->render('akun_premium_konfirmasi', [
//
//                'model' => $model,
//
//            ]);
//        } else {
//            return $this->goHome();
//        }
//    }
//
//    public function actionAkunTransaksi(){
//
//        if(!Yii::$app->user->isGuest) {
//
//            $searchModel = new DashboardUserPremiumTransaksiSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//            return $this->render('dashboardtransaksi/index', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        } else {
//
//            return $this->goHome();
//
//        }
//
//    }



    /*User Start Here*/
    public function actionDataCv(){

        if(!Yii::$app->user->isGuest) {

            $this->view->params['dashboard-data-cv'] = true;
            $model = DashboardPelamar::find()->where(['pelamarUserID' => Yii::$app->user->identity->userID])->one();
            $model->pelamarPendididkanFormal = json_decode($model->pelamarPendididkanFormal);
            $model->pelamarPendidikanNonFormal = json_decode($model->pelamarPendidikanNonFormal);
            $model->pelamarPengalamanAkademik = json_decode($model->pelamarPengalamanAkademik);
            $model->pelamarPengalamanKerja = json_decode($model->pelamarPengalamanKerja);
            $model->pelamarKemampuan = json_decode($model->pelamarKemampuan);
            if ($model->load(Yii::$app->request->post())) {

                $model->pelamarPendididkanFormal = json_encode($model->pelamarPendididkanFormal);
                $model->pelamarPendidikanNonFormal = json_encode($model->pelamarPendidikanNonFormal);
                $model->pelamarPengalamanAkademik = json_encode($model->pelamarPengalamanAkademik);
                $model->pelamarPengalamanKerja = json_encode($model->pelamarPengalamanKerja);
                $model->pelamarKemampuan = json_encode($model->pelamarKemampuan);

                if ($model->validate()) {

                    $model->save();
                    return $this->redirect(['dashboard/data-cv']);
//                    echo "<pre>";
//                    print_r($model);
//                    exit();

                }

            }
            return $this->render('DashboardPelamar/data-cv', [

                'model' => $model,

            ]);

        } else {

            return $this->goHome();

        }

    }

    public function  actionEvent(){
        $event = \common\models\WebEvents::find()->where(['eventsStatus'=>'Aktif'])->one();

        return $this->render('event', ['model'=>$event]);
    }

    public function actionTiket($id){
        $this->layout = 'tiket';
        $event = \common\models\WebEvents::findOne($id);
        $data = \common\models\WebTiketEvents::find()->where(['tiketEventsEventsID'=>$event->eventsID,'tiketEventsUserID' => Yii::$app->user->identity->userID])->one();
        if (!isset($data)){
            $tiket = new \common\models\WebTiketEvents;
            $tiket->tiketEventsEventsID = $event->eventsID;
            $tiket->tiketEventsUserID = Yii::$app->user->identity->userID;
            $tiket->tiketEventsStatus = "Aktif";
            $tiket->save();
            $format = new MeCardFormat();
            $format->firstName = $event->eventsJudul;
            $format->note = "SK-".$tiket->tiketEventsID;
            $format->setEmail(Yii::$app->user->identity->email);


            $qrCode = new QrCode($format);


            $qrCode->writeFile(Yii::$app->basePath . "/web/qrcode/" . Yii::$app->user->identity->username.'.png');
        }

        return $this->render('tiket', ['event'=>$event]);
    }

}
