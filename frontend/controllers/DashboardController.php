<?php
namespace frontend\controllers;

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
        if(!Yii::$app->user->isGuest) {

            if (Yii::$app->user->identity->role == 'user') {

                return $this->render('dashboard_starter');

            } else {
                $data = "Welcome back " . Yii::$app->user->identity->nama;
                return $this->render('dashboard', ['view' => 'index','data' => $data]);
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionToPelamar(){
        if(!Yii::$app->user->isGuest) {

            if (Yii::$app->user->identity->role == 'user') {

                $user = User::findOne(Yii::$app->user->identity->userID);
                $user->role = 'pelamar';
                $user->save();

                return $this->redirect(['/dashboard']);

            } else {
                //$data = "Welcome back " . Yii::$app->user->identity->nama;
                return $this->goBack();
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionProfile(){
        $data = '';
        return $this->render('dashboard', ['view' => 'profile','data' => $data]);
    }
}
