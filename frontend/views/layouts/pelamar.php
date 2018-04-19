<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/12/2018
 * Time: 6:15 AM
 */
?>
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
<?php include 'component/head.php'; ?>
<body>

<div class="off-canvas-content  is-sticky-wrapper  header-05-center    " data-off-canvas-content>
    <div id="home"></div>
    <!-- start content -->
    <header class="header is-sticky " id="header">
        <div class="header-top">
            <div class="row">
                <div class="large-6 column hide-for-small-only">
                    <div class="header-top__left">Selamat Datang di Website <?= \common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteTitle']; ?></div>
                </div>
                <div class="large-6 column text-right">
                    <ul class="float-right sosmed-share m-l-20 hide-for-small-only">
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="header-top__right float-right">
                        Call Us (+01) 545 555 ( Office Hours )
                        <span class="hide-for-small-only">| Share Us</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="header-middle" id="mainmenu" style="background:#ffffff; box-shadow:0px 2px 5px #cccccc;">
            <div class="row">
                <div class="large-5 small-10 column">
                    <div class="media-object">
                        <div class="media-object-section">
                            <a href="<?= Yii::$app->urlManager->createUrl('site') ?>">
                                <figure class="logo-top">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="height:60px; margin: 6px;">
                                </figure>
                            </a>
                        </div>
                        <div class="media-object-section hide-for-small-only">
                            <div class="nav-top-place">
                                <a href="<?= Url::to(['event/index','id'=>$this->params['id']])?>"><?= strtoupper(\common\models\WebEvents::findOne($this->params['id'])['eventsJudul']); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- end media-object -->
                </div>
                <div class="large-7 small-2 column">
                    <ul class="menu dropdown float-right menu-main show-for-small-only" data-dropdown-menu>
                        <li>
                            <a href="#">
                                <button class="menu-icon" type="button" data-open="offCanvas"></button>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu dropdown float-right menu-main hide-for-small-only" data-dropdown-menu>
                        <li >
                            <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/index','id'=>$this->params['id']]) ?>" class="<?php if(isset($this->params['active_home'])){ echo $this->params['active_home'];}?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/registrasi', 'id'=>$this->params['id']]) ?>" class="<?php if(isset($this->params['active_regist'])){ echo $this->params['active_regist'];}?>">Registrasi</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/denah', 'id'=>$this->params['id']]) ?>" class="<?php if(isset($this->params['active_denah'])){ echo $this->params['active_denah'];}?>">Denah</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/jadwal', 'id'=>$this->params['id']]) ?>" class="<?php if(isset($this->params['active_jadwal'])){ echo $this->params['active_jadwal'];}?>">Jadwal</a>
                        </li>

                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/pencarian', 'id'=>$this->params['id']]) ?>">Lowongan</a>
                        </li>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            ?>
                            <li class="has-submenu">
                                <a href="#0" <?php if(isset($this->params['user'])){ echo 'class="active"'; } ?>>@<?= Yii::$app->user->identity->username ?></a>
                                <ul class="submenu menu vertical" data-submenu>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>" <?php if(isset($this->params['dashboard'])){ echo 'class="active"'; } ?>>Dashboard</a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>" <?php if(isset($this->params['profile'])){ echo 'class="active"'; } ?>>Profil</a></li>
                                    <li><a href="<?= Url::to(['event-pelamar/logout', 'id'=>$this->params['id']]) ?>">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['event-pelamar/login', 'id'=>$this->params['id']]) ?>" <?php if(isset($this->params['login'])){ echo 'class="active"'; } ?>>Login</a>
                            </li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

<!-- end header -->
<?php $this->beginBody() ?>
<?= $content ?>
    <script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/libs/jquery.js"></script>
<?php $this->endBody() ?>

    <?php include 'component/footer.php'; ?>

<!-- end footer-->

    <?php include 'component/js.php'; ?>
</body>

</html>
<?php $this->endPage() ?>


