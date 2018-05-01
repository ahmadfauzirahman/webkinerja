<?php

namespace frontend\controllers;
use common\models\LoginForm;
use common\models\WebBooking;
use Yii;

class EventPerusahaanController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        $jadwal = \common\models\WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$event->eventsID])->all();
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_home'] = 'active';
        return $this->render('index',['event'=>$event, 'jadwal'=>$jadwal]);
    }

    public function actionRegistrasi($id)
    {
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_regist'] = 'active';
        return $this->render('registrasi',['event'=>$event]);
    }

    public function actionDenah($id)
    {
        $this->layout = 'denah_per';
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

    public function actionBooking($id, $id2){
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->role == 'perusahaan-premium' OR Yii::$app->user->identity->role == 'perusahaan-non-premium'){
                $this->layout = 'denah_per';
                $event = \common\models\WebEvents::findOne($id);
                $stand = \common\models\WebStands::findOne($id2);
                $perusahaan = \common\models\WebPerusahaan::find()->where(['perusahaanUserID' => Yii::$app->user->identity->userID])->one();
                Yii::$app->view->params['id'] = $event->eventsID;
                Yii::$app->view->params['active_regist'] = 'active';
                Yii::$app->view->params['active_form'] = 'active';

                $model = new WebBooking();
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->render('konfirm', ['event' => $event->eventsID]);
                }
                return $this->render('booking',['event'=>$event, 'model'=>$model, 'stand'=>$stand, 'perusahaan'=>$perusahaan]);
            }
            return $this->redirect(['event-perusahaan/login-booking', 'id'=>$id, 'id2'=>$id2]);
        }else{
            return $this->redirect(['event-perusahaan/login-booking', 'id'=>$id, 'id2'=>$id2]);
        }

    }

    public function actionFasilitasStand($id){
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_regist'] = 'active';
        Yii::$app->view->params['active_fasilitas'] = 'active';


        return $this->render('fasilitas',['event'=>$event]);

    }

    public function actionLogin($id)
    {
        $this->layout = 'perusahaan';
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

    public function actionLoginBooking($id,$id2)
    {
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        $this->view->params['login'] = true;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $_SESSION['menu'] = 0;
            return $this->redirect(['event-perusahaan/booking', 'id'=>$id, 'id2'=>$id2]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

}
