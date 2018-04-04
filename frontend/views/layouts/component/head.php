<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 15/03/2018
 * Time: 11.34
 */
use yii\helpers\Html;

?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
<title><?= Yii::$app->name //Html::encode($this->title) ?></title>
<?php $this->head() ?>
<style>
    .side-link a{
        color: #666666;
    }
    .side-link a:hover{
        color: #33a828;
    }
    .side-link:hover{
        background: #f9f9f9;
        color: #33a828;
    }
    .side-link:hover img{
        border-color: #A7D558 !important;
    }
    a:hover{
        text-decoration: none;
    }
    .menu-dashboard > li a:hover {
        color: #33a828;
    }
    .menu-dashboard > li a.active {
        color: #33a828;
    }
    .card-lowongan:hover{
        -webkit-box-shadow: 0px 2px 10px #d5d5d5;
        -moz-box-shadow: 0px 2px 10px #d5d5d5;
        box-shadow: 0px 2px 10px #d5d5d5;
    }
</style>
<link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png"/>
</head>