<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 15/03/2018
 * Time: 11.22
 */

use yii\helpers\Url;
?>
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
        Call Center <?= \common\models\WebSetting::findOne(1)['settingTelepon'] ?> ( Jam Kerja )
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
                        <a href="<?= Yii::$app->request->baseUrl ?>"><?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteDescription']); ?></a>
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
                    <a href="<?= Yii::$app->urlManager->createUrl('site') ?>" <?php if(isset($this->params['index'])){ echo 'class="active"'; } ?>>Home</a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl('site/lowongan') ?>" <?php if(isset($this->params['lowongan'])){ echo 'class="active"'; } ?>>Lowongan</a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl('site/event') ?>" <?php if(isset($this->params['events'])){ echo 'class="active"'; } ?>>Events</a>
                </li>
                <?php

                $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->all();
                foreach($d0 AS $d0Data){
                    ?>
                    <li>
                        <a href="?r=site/post&kategori=<?=$d0Data->kategoriArtikelID ?>" <?php if(isset($this->params[$d0Data->kategoriArtikelID])){ echo 'class="active"'; } ?>><?= $d0Data->kategoriArtikelNama ?></a>
                    </li>
                    <?php
                }

                ?>
                <!--li>
                    <a href="<?php //= Yii::$app->urlManager->createUrl('site/developer') ?>" <?php //if(isset($this->params['developer'])){ echo 'class="active"'; } ?>>Developer</a>
                </li-->
                <?php
                if (!Yii::$app->user->isGuest) {
                    ?>
                    <li class="has-submenu">
                        <a href="#0" <?php if(isset($this->params['user'])){ echo 'class="active"'; } ?>>@<?= Yii::$app->user->identity->username ?></a>
                        <ul class="submenu menu vertical" data-submenu>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>" <?php if(isset($this->params['dashboard'])){ echo 'class="active"'; } ?>>Dashboard</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>" <?php if(isset($this->params['profile'])){ echo 'class="active"'; } ?>>Profil</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= Url::to(['site/logout']) ?>"><span class="fa fa-power-off"></span></a></li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>" <?php if(isset($this->params['login'])){ echo 'class="active"'; } ?>>Login</a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl('site/register') ?>" <?php if(isset($this->params['register'])){ echo 'class="active"'; } ?>>Register</a>
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