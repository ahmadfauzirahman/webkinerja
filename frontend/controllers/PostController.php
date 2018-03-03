<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;


/**
 * Site controller
 */
class PostController extends Controller{

    public function actionIndex()
    {
        $this->layout = 'ex';
        return $this->render('index',['']);
//        exit();

    }

}