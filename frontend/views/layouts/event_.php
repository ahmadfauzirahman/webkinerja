<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/11/2018
 * Time: 10:31 AM
 */
?>
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
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
        .btn-block{
            display: inline !important;
        }
    </style>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png"/>
</head>
<body style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    width: 100%; height: max-content;
    ">
    <!-- end header -->
    <?php $this->beginBody() ?>
    <?= $content ?>
    <script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/libs/jquery.js"></script>
    <?php $this->endBody() ?>
    <!-- end footer-->
    <?php include 'component/js.php'; ?>
</body>

</html>
<?php $this->endPage() ?>

