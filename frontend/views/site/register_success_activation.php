<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<!-- contact support -->
<div id="expertise" class="section p-t-60 bg--grey" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-bottom:100px;
    ">
    <div class="row">
        <div class="large-8 medium-12 small-12 large-centered column">
            <div class="el-content text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">Selamat!</p>
                <h2 class="el-title">Aktifasi Akun Telah Berhasil.</h2>
                <div class="divider"></div>
                <div class="clear"></div>
                <p class="m-t-30">Silahkan login ke akun anda!
                    <br/>
                    <br/>
                <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>" class="btn btn-success btn-lg">Login</a> </p>
            </div>
        </div>
    </div>
</div>