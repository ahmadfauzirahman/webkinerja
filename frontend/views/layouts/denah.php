<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/16/2018
 * Time: 11:14 AM
 */
?>

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
        .btn-search{
            display: inline !important;
        }
        .btn-search a{
            color: white !important;
        }
        body{
            font-family: 'Raleway', sans-serif;
            color: #333;
        }

        header h1{
            text-align: center;
            font-weight: bold;
            margin-top: 0;
        }

        header p{
            text-align: center;
            margin-bottom: 0;
        }

        .hexa{
            border: 0px;
            float: left;
            text-align: center;
            height: 35px;
            width: 60px;
            font-size: 22px;
            background: #f0f0f0;
            color: #3c3c3c;
            position: relative;
            margin-top: 15px;
        }

        .hexa:before{
            content: "";
            position: absolute;
            left: 0;
            width: 0;
            height: 0;
            border-bottom: 15px solid #f0f0f0;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            top: -15px;
        }

        .hexa:after{
            content: "";
            position: absolute;
            left: 0;
            width: 0;
            height: 0;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-top: 15px solid #f0f0f0;
            bottom: -15px;
        }

        .timeline {
            position: relative;
            padding: 0;
            width: 100%;
            margin-top: 20px;
            list-style-type: none;
        }

        .timeline:before {
            position: absolute;
            left: 50%;
            top: 0;
            content: ' ';
            display: block;
            width: 2px;
            height: 100%;
            margin-left: -1px;
            background: rgb(213,213,213);
            background: -moz-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
            background: -webkit-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
            background: -o-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
            background: -ms-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
            background: linear-gradient(to bottom, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
            z-index: 5;
        }

        .timeline li {
            padding: 0.5em 0;
        }

        .timeline .hexa{
            width: 16px;
            height: 10px;
            position: absolute;
            background: forestgreen;
            z-index: 5;
            left: 0;
            right: 0;
            margin-left:auto;
            margin-right:auto;
            top: -30px;
            margin-top: 0;
        }

        .timeline .hexa:before {
            border-bottom: 4px solid forestgreen;
            border-left-width: 8px;
            border-right-width: 8px;
            top: -4px;

        }

        .timeline .hexa:after {
            border-left-width: 8px;
            border-right-width: 8px;
            border-top: 4px solid forestgreen;
            bottom: -4px;
        }

        .direction-l,
        .direction-r {
            float: none;
            width: 100%;
            text-align: center;
        }

        .flag-wrapper {
            text-align: center;
            position: relative;
        }

        .flag {
            position: relative;
            display: inline;
            background: rgb(255,255,255);
            font-weight: 600;
            z-index: 15;
            padding: 6px 10px;
            text-align: left;
            border-radius: 5px;
        }

        .direction-l .flag:after,
        .direction-r .flag:after {
            content: "";
            position: absolute;
            left: 50%;
            top: -15px;
            height: 0;
            width: 0;
            margin-left: -8px;
            border: solid transparent;
            border-bottom-color: rgb(255,255,255);
            border-width: 8px;
            pointer-events: none;
        }

        .direction-l .flag {
            -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
        }

        .direction-r .flag {
            -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
        }

        .time-wrapper {
            display: block;
            position: relative;
            margin: 4px 0 0 0;
            z-index: 14;
            line-height: 1em;
            vertical-align: middle;
            color: #fff;
        }

        .direction-l .time-wrapper {
            float: none;
        }

        .direction-r .time-wrapper {
            float: none;
        }

        .time {
            background: forestgreen;
            display: inline-block;
            padding: 8px;
        }

        .desc {
            position: relative;
            margin: 0em 0 0 0;
            padding: 0.5em;
            background: rgb(254,254,254);
            -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
            -moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
            box-shadow: 0 0 1px rgba(0,0,0,0.20);
            z-index: 15;
        }

        .direction-l .desc,
        .direction-r .desc {
            position: relative;
            margin: 0em 0.5em 0 1em;
            padding: 0.5em;
            z-index: 15;
        }

        @media(min-width: 768px){
            .timeline {
                width: 660px;
                margin: 0 auto;
                margin-top: 20px;
            }

            .timeline li:after {
                content: "";
                display: block;
                height: 0;
                clear: both;
                visibility: hidden;
            }

            .timeline .hexa {
                left: -28px;
                right: auto;
                top: 8px;
            }

            .timeline .direction-l .hexa {
                left: auto;
                right: -28px;
            }

            .direction-l {
                position: relative;
                width: 310px;
                float: left;
                text-align: right;
            }

            .direction-r {
                position: relative;
                width: 310px;
                float: right;
                text-align: left;
            }

            .flag-wrapper {
                display: inline-block;
            }

            .flag {
                font-size: 18px;
            }

            .direction-l .flag:after {
                left: auto;
                right: -16px;
                top: 50%;
                margin-top: -8px;
                border: solid transparent;
                border-left-color: rgb(254,254,254);
                border-width: 8px;
            }

            .direction-r .flag:after {
                top: 50%;
                margin-top: -8px;
                border: solid transparent;
                border-right-color: rgb(254,254,254);
                border-width: 8px;
                left: -8px;
            }

            .time-wrapper {
                display: inline;
                vertical-align: middle;
                margin: 0;
            }

            .direction-l .time-wrapper {
                float: left;
            }

            .direction-r .time-wrapper {
                float: right;
            }

            .time {
                padding: 5px 10px;
            }

            .direction-r .desc {
                margin: 0em 0 0 0.75em;
            }
        }

        @media(min-width: 992px){
            .timeline {
                width: 800px;
                margin: 0 auto;
                margin-top: 20px;
            }

            .direction-l {
                position: relative;
                width: 380px;
                float: left;
                text-align: right;
            }

            .direction-r {
                position: relative;
                width: 380px;
                float: right;
                text-align: left;
            }
        }
    </style>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png"/>
</head>
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
                        <li>
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
                            <a href="" >Lowongan</a>
                        </li>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            ?>
                            <li class="has-submenu">
                                <a href="#0" <?php if(isset($this->params['user'])){ echo 'class="active"'; } ?>>@<?= Yii::$app->user->identity->username ?></a>
                                <ul class="submenu menu vertical" data-submenu>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>" <?php if(isset($this->params['dashboard'])){ echo 'class="active"'; } ?>>Dashboard</a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>" <?php if(isset($this->params['profile'])){ echo 'class="active"'; } ?>>Profil</a></li>
                                    <li><a href="<?= Url::to(['site/logout']) ?>">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>" <?php if(isset($this->params['login'])){ echo 'class="active"'; } ?>>Login</a>
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
    <?php $this->endBody() ?>

    <footer class="section footer p-t-30 p-b-30 bg--dark" id="contact">
        <div class="row">
            <div class="large-5 small-12 column">
                <div class="block-widget">
                    <div class="block-widget_header">
                    </div>
                    <div class="block-widget_content">
                        <p>
                            <figure class="logo-footer">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="height:60px; margin: 6px;">
                            </figure>
                        </p>
                        <p>We have worked with a wide range of companies, from Fortune 500s with major international presences to startup
                            businesses with highly focused local clientele. We strive to collaborate with like-minded businesses to make
                            a difference environmentally and socially. Let’s collaborate.</p>
                    </div>
                </div>
            </div>
            <div class="large-6 small-12 column large-right">
                <div class="block-partner hide-for-small-only">
                    <ul class="block-partner_list vertical large-horizontal medium-horizontal menu">

                        <li class="block-partner_list-item">
                            <h4>Facebook</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Google</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Paypal</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Top Agency</h4>
                            <span>2016-2020</span>
                        </li>

                    </ul>
                </div>
                <div class="block-newsletter">
                    <h4>Subscribe to our Newsletter</h4>
                    <form>
                        <div class="input-group">
                            <input class="input-group-field field-text" type="email" placeholder="Your email address">
                            <div class="input-group-button">
                                <input type="submit" class="button -rounded" value="Subscribe">
                            </div>
                        </div>
                    </form>
                    <p class="text-small">Learn About our company at
                        <a href="#"><?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteTitle']); ?></a> | Join with our company:
                        <a href="#">Career</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 column">
                <div class="footer-bottom">
                    <div class="footer-copyright float-left">
                        &copy; copyright <?= date('Y') ?> - <?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteTitle']); ?>
                    </div>
                    <div class="footer-nav_icon float-right">
                        <ul class="menu horizontal">
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
                        </ul>
                    </div>
                    <div class="footer-nav float-right hide-for-small-only">
                        <ul class="menu horizontal">
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                            <li>
                                <a href="">Service</a>
                            </li>
                            <li>
                                <a href="">Cases</a>
                            </li>
                            <li>
                                <a href="">News Page</a>
                            </li>
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end footer-->
    <?php
    $this->registerJsFile(Yii::$app->request->baseUrl."/assets/1b123941/jquery.js");
    $this->registerJsFile(Yii::$app->request->baseUrl."/assets/6deac4a1/js/bootstrap.js");
?>
</body>

</html>
<?php $this->endPage() ?>



