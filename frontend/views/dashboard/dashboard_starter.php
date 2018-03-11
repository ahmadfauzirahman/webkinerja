<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<!-- contact support -->
<div class="section p-b-60 p-t-60" id="developer" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png') no-repeat; box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-7 large-centered column">
            <div class="section-header text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">SELAMAT DATANG</p>
                <h2 class="el-title"><?= Yii::$app->user->identity->nama ?></h2>
                <div class="divider"></div>
                <div class="clear"></div>
                <p class="m-t-30">Silahkan pilih jenis akun yang anda inginkan</p>
            </div>

            <div class="clear"></div>

            <div class="large-6 column text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-icon font-size-30 m-b-15 p-t-60">
                    <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/icons/socmed/7analytic-icon3.svg" width="120">
                </div>
                <div class="el-title">
                    <a href="#" class="btn btn-lg btn-warning">Sebagai Perusahaan</a>
                </div>
            </div>

            <div class="large-6 column text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-icon font-size-30 m-b-15 p-t-60">
                    <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/icons/socmed/3listen-icon2.svg" width="120">
                </div>
                <div class="el-title">
                    <a href="<?= Yii::$app->urlManager->createUrl('dashboard/to-pelamar') ?>" class="btn btn-lg btn-success">Sebagai Pelamar</a>
                </div>
            </div>

            <div class="clear"></div>
            <br>

        </div>
    </div>
</div>