<?php

namespace frontend\controllers;
use Yii;

class EventPelamarController extends \yii\web\Controller
{

    public function actionIndex($id)
    {
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        $jadwal = \common\models\WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$event->eventsID])->all();
        Yii::$app->view->params['active_home'] = 'active';
        Yii::$app->view->params['id'] = $event->eventsID;
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
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_denah'] = 'active';
        return $this->render('denah',['event'=>$event]);
    }

}
