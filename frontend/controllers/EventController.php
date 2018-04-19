<?php

namespace frontend\controllers;

class EventController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $this->layout = 'event_';
        $this->view->params['events'] = true;
        $event = \common\models\WebEvents::findOne($id);
        return $this->render('index', ['event'=>$event]);
    }

    public function actionPages($event,$user){

        $event = \common\models\WebEvents::findOne($event);
        if ($user == "Pelamar"){
            return $this->render('pelamar', ['event'=>$event]);
        }else{
            return $this->render('perusahaan', ['event'=>$event]);
        }
    }

}
