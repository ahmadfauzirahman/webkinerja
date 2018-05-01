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
<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>
    <?php include 'component/menu.php'; ?>
</div>
<div class="off-canvas-content  is-sticky-wrapper  header-05-center    " data-off-canvas-content>
    <div id="home"></div>
    <!-- start content -->
    <?php include 'component/header.php'; ?>
    <?php $this->beginBody() ?>
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
                    <p class="small" style="color: #999999;">
                        <?php
                            $status = \frontend\models\Dashboard\DashboardUserPremium::find()->where(['userID' => Yii::$app->user->identity->userID])->one()['userPremiumStatus'];
                            if($status == 'Aktif'){ echo '<span class="badge badge-success"><i class="fa fa-star" style="color: yellow;"></i> <b>Premium Account</b> </span> '; }
                        ?>
                        <i class="fa fa-circle-o"></i> <?= ucwords(str_replace('-',' ',Yii::$app->user->identity->role)); ?> | <i class="fa fa-envelope-o"></i> <?= Yii::$app->user->identity->email; ?> | <i class="fa fa-at"></i> <?= Yii::$app->user->identity->username; ?> | <i class="fa fa-slack"></i> <?= Yii::$app->user->identity->userID; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- contact support -->
    <div class="section" id="developer">
        <div class="row">
            <div class="large-3 column" style="border: 1px solid #f5f5f5; border-top: 0; padding-top: 20px; padding-bottom: 20px; margin-bottom: 10px;">
                <div class="section-header animate " <?php if($_SESSION['menu'] == 0){ echo 'data-animate="fadeInLeft" data-duration="1s" data-delay="0.1s" data-offset="50"'; $_SESSION['menu'] = 1;} ?>>
                    <ul class="vertical menu menu-dashboard" data-accordion-menu>
                        <li class="is-active"><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>" <?php if(isset($this->params['dashboard'])){ echo 'class="active"'; } ?>><i class="fa fa-desktop"></i> Dashboard</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>" <?php if(isset($this->params['profile'])){ echo 'class="active"'; } ?>><i class="fa fa-user"></i> Profile</a></li>

                        <?php if(Yii::$app->user->identity->role == 'perusahaan-premium' || Yii::$app->user->identity->role == 'perusahaan-non-premium'){ ?>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-perusahaan') ?>" <?php if(isset($this->params['perusahaan'])){ echo 'class="active"'; } ?>><i class="fa fa-building"></i> Data Perusahaan</a></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-user-premium-transaksi') ?>" <?php if(isset($this->params['transaksi'])){ echo 'class="active"'; } ?>><i class="fa fa-money"></i> Transaksi Akun Premium</a></li>

                            <li><hr/></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-lowongan') ?>" <?php if(isset($this->params['dashboard-lowongan'])){ echo 'class="active"'; } ?>><i class="fa fa-bullhorn"></i> Lowongan</a></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-perusahaan-pelamar') ?>" <?php if(isset($this->params['dashboard-pelamar'])){ echo 'class="active"'; } ?>><i class="fa fa-users"></i> Pelamar Lowongan</a></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-perusahaan-hasil-seleksi') ?>" <?php if(isset($this->params['dashboard-hasil-seleksi'])){ echo 'class="active"'; } ?>><i class="fa fa-bar-chart-o"></i> Hasil Seleksi</a></li>

                            <li><hr/></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard-artikel') ?>" <?php if(isset($this->params['dashboard-artikel'])){ echo 'class="active"'; } ?>><i class="fa fa-files-o"></i> Artikel</a></li>

                        <?php } elseif(Yii::$app->user->identity->role == 'alumni' || Yii::$app->user->identity->role == 'umum' || Yii::$app->user->identity->role == 'mahasiswa'){ ?>

                            <li>
                                <a href="#0" <?php if(isset($this->params['dashboard-data-cv']) || isset($this->params['dashboard-berkas-pelamar'])){ echo 'class="active"'; } ?>><i class="fa fa-file"></i> Data Lamaran</a>
                                <ul class="menu vertical nested  <?php if(isset($this->params['dashboard-data-cv']) || isset($this->params['dashboard-berkas-pelamar'])){ echo "is-active"; } ?>">
                                    <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard/data-cv']) ?>" <?php if(isset($this->params['dashboard-data-cv'])){ echo 'class="active"'; } ?>><i class="fa fa-files-o"></i> Data CV</a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard-berkas-pelamar']) ?>" <?php if(isset($this->params['dashboard-berkas-pelamar'])){ echo 'class="active"'; } ?>><i class="fa fa-files-o"></i> Data Berkas Pelamar</a></li>
                                </ul>
                            </li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard-pengajuan-lamaran']) ?>" <?php if(isset($this->params['dashboard-pengajuan-lamaran'])){ echo 'class="active"'; } ?>><i class="fa fa-file"></i> Pengajuan Lamaran Kerja</a></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard-lamaran-diterima']) ?>" <?php if(isset($this->params['dashboard-lamaran-diterima'])){ echo 'class="active"'; } ?>><i class="fa fa-file"></i> Lamaran Diterima</a></li>

                            <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard-panggilan-tes']) ?>" <?php if(isset($this->params['dashboard-panggilan-tes'])){ echo 'class="active"'; } ?>><i class="fa fa-bullhorn"></i> Panggilan Tes</a></li>

                            <?php if(\common\models\WebSetting::findOne(1)['settingTicketEvent'] == 1){ ?>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['dashboard/event']) ?>" <?php if(isset($this->params['dashboard-event'])){ echo 'class="active"'; } ?>><i class="fa fa-ticket"></i> Tiket Event</a></li>
                            <?php } ?>
                        <?php } elseif(Yii::$app->user->identity->role == 'admin'){ ?>

                            <li><a href="<?= Yii::$app->request->baseUrl ?>/../../admin"><i class="fa fa-desktop"></i> Back to Backend</a></li>

                        <?php } ?>

                            <li><a href="#0"><i class="fa fa-support"></i> Bantuan</a></li>

                    </ul>
                </div>
            </div>
            <div class="large-9 column">
                <div class="section-header animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                    <?= $content ?>

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
    <?php include 'component/footer.php'; ?>
</div>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/libs/jquery.js"></script>
<?php $this->endBody() ?>
<?php include 'component/js.php'; ?>
</body>

</html>
<?php $this->endPage() ?>
