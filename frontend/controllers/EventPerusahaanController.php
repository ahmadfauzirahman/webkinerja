<?php

namespace frontend\controllers;
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
        $this->layout = 'denah';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_denah'] = 'active';
        return $this->render('denah',['event'=>$event]);
    }

    public function actionJadwal($id){
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_jadwal'] = 'active';


        return $this->render('jadwal',['event'=>$event]);

    }

    public function actionBooking($id, $id2){
        $this->layout = 'denah';
        $event = \common\models\WebEvents::findOne($id);
        $stand = \common\models\WebStands::findOne($id2);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_regist'] = 'active';
        Yii::$app->view->params['active_form'] = 'active';

        $model = new WebBooking();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bookingID]);
        }

        return $this->render('booking',['event'=>$event, 'model'=>$model, 'stand'=>$stand]);

    }

    public function actionFasilitasStand($id){
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_regist'] = 'active';
        Yii::$app->view->params['active_fasilitas'] = 'active';


        return $this->render('fasilitas',['event'=>$event]);

    }



}
