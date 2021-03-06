<?php

namespace frontend\controllers;
use common\models\LoginForm;
use frontend\models\LowonganSearch;
use Yii;
use Da\QrCode\QrCode;
use Da\QrCode\Format\MeCardFormat;

class EventPelamarController extends \yii\web\Controller
{

    public function actionIndex($id)
    {
        $this->layout = 'pelamar';
        $event = \common\models\WebEvents::findOne($id);
        $jadwal = \common\models\WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$event->eventsID])->all();
        Yii::$app->view->params['active_home'] = 'active';
        Yii::$app->view->params['id'] = $event->eventsID;
        return $this->render('index',['event'=>$event, 'jadwal'=>$jadwal]);
    }

    public function actionRegistrasi($id)
    {
        $this->layout = 'pelamar';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_regist'] = 'active';
        return $this->render('registrasi',['event'=>$event]);
    }

    public function actionDenah($id)
    {
        $this->layout = 'denah';
        $event = \common\models\WebEvents::findOne($id);
        $Gold = \common\models\WebKategoriStand::find()->where(["kategoriStandNama"=>"Gold"])->one();
        $standart = \common\models\WebKategoriStand::find()->where(["kategoriStandNama"=>"Standart"])->one();
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_denah'] = 'active';
        return $this->render('denah',['event'=>$event,"gold"=>$Gold, "standart"=>$standart]);
    }

    public function actionJadwal($id){
        $this->layout = 'denah_per';
        $event = \common\models\WebEvents::findOne($id);
        $kategoriseleksi = \common\models\WebKategoriSeleksi::find()->where(['kategoriSeleksiNama'=>$event->eventsJudul])->one();
        if (isset($kategoriseleksi)){
            $jadwaltes = \common\models\WebSeleksi::find()->where(['seleksiKategoriSeleksiID'=>$kategoriseleksi->kategoriSeleksiID])->all();
        }
        $jadwalpresentasi = \common\models\WebPresentasi::find()->where(['presentasiEventsID'=>$event->eventsID])->all();
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_jadwal'] = 'active';

        if (isset($kategoriseleksi)){
            return $this->render('jadwal',['event'=>$event, 'presentasi'=>$jadwalpresentasi, 'jadwaltes'=>$jadwaltes]);
        }else{
            return $this->render('jadwal',['event'=>$event, 'presentasi'=>$jadwalpresentasi]);
        }

    }

    public function actionPencarian($id){
        $this->layout = 'pelamar';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        $searchModel = new LowonganSearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);
//        $provider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 5
//            ]
//        ]);
        return $this->render('pencarian',[
            'searchModel' => $searchModel,
            //'models' => $provider->getModels(),
            'provider' => $provider,
            'event' => $event
        ]);

    }

    public function actionLogin($id)
    {
        $this->layout = 'pelamar';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        $this->view->params['login'] = true;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $_SESSION['menu'] = 0;
            return $this->redirect(['event-pelamar/index', 'id'=>$id]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout($id)
    {
        Yii::$app->user->logout();

        return $this->redirect(['event-pelamar/index', 'id'=>$id]);
    }

}
