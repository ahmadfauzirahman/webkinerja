<?php

namespace frontend\controllers;

class EventPerusahaanController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $this->layout = 'perusahaan';
        $event = \common\models\WebEvents::findOne($id);
        return $this->render('index',['event'=>$event]);
    }

}
