<?php

namespace frontend\controllers;
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
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_denah'] = 'active';
        return $this->render('denah',['event'=>$event]);
    }

    public function actionJadwal($id){
        $this->layout = 'pelamar';
        $event = \common\models\WebEvents::findOne($id);
        Yii::$app->view->params['id'] = $event->eventsID;
        Yii::$app->view->params['active_jadwal'] = 'active';


        return $this->render('jadwal',['event'=>$event]);

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

}
