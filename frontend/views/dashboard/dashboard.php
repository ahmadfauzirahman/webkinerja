<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

//$this->title = 'My Yii Application';
?>
<div class="section p-t-60 p-b-30 bg--grey" id="about" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 small-12 column">
            <div class="el-content">
                <br>
                <?php if(Yii::$app->user->identity->foto == ''){ ?>
                    <img class="avatar" style="border:1px solid #dddddd; float: left; width: 80px; height: 80px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/avatar.png" alt="avatar">
                <?php } else { ?>
                        <img class="avatar" style="border:1px solid #dddddd; float: left; width: 80px; height: 80px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= Yii::$app->user->identity->foto; ?>" alt="avatar">
                <?php } ?>
                <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd; margin-bottom: 0"><?= Yii::$app->user->identity->nama; ?></h2>
                <p class="small" style="color: #999999;"><i class="fa fa-circle-o"></i> <?= ucfirst(Yii::$app->user->identity->role); ?> | <i class="fa fa-envelope-o"></i> <?= Yii::$app->user->identity->email; ?> | <i class="fa fa-at"></i> <?= Yii::$app->user->identity->username; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- contact support -->
<div class="section" id="developer">
    <div class="row">
        <div class="large-3 column" style="border: 1px solid #f5f5f5; border-top: 0; padding-top: 20px; padding-bottom: 20px; margin-bottom: 10px;">
            <div class="section-header animate " data-animate="fadeInLeft" data-duration="1s" data-delay="0.1s" data-offset="50">
                <ul class="vertical menu" data-accordion-menu>
                    <li class="is-active"><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>"><i class="fa fa-desktop"></i> Dashboard</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li>
                        <a href="#0"><i class="fa fa-file"></i> Data Lamaran</a>
                        <ul class="menu vertical nested">
                            <li><a href="#0"><i class="fa fa-files-o"></i> Data CV</a></li>
                            <li><a href="#0"><i class="fa fa-files-o"></i> Berkas Lamaran</a></li>
                        </ul>
                    </li>
                    <li><a href="#0"><i class="fa fa-file"></i> Pengajuan Lamaran</a></li>
                    <li><a href="#0"><i class="fa fa-file"></i> Lamaran Diterima</a></li>
                    <li><a href="#0"><i class="fa fa-bullhorn"></i> Panggilan Tes</a></li>
                    <li><a href="#0"><i class="fa fa-support"></i> Bantuan</a></li>
                </ul>
            </div>
        </div>
        <div class="large-9 column">
             <div class="section-header animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                <?= $this->render('dashboardView/'.$view,['data' => $data]) ?>

            </div>
            <div class="section-content m-t-60">
                <div class="large-12 column text-center animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                </div>
                <div class="clear"></div>
            </div>
        </div>
<div class="clear"></div>
<br>
</div>
</div>