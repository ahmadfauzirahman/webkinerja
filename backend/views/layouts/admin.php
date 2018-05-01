<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

\dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="?r=site" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>PPKA</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Tasks Menu -->

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="?r=site/logout" data-method="post"><i class="fa fa-power-off"></i> Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= Yii::$app->request->baseUrl ?>/foto/<?= Yii::$app->user->identity->foto ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p class="text-capitalize">
                        <?= Yii::$app->user->identity->username ?></p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/site']],
                        ['label' => 'Data Pengguna', 'icon' => 'users', 'url' => ['/user']],
                        ['label' => 'Data Jenjang Pendidikan', 'icon' => 'mortar-board', 'url' => ['/web-jenjang-pendidikan'],],

                        [
                            'label' => 'Data Pelamar',
                            'icon' => 'building',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Pelamar', 'icon' => 'building', 'url' => ['/web-pelamar'],],
                                ['label' => 'Berkas Pelamar', 'icon' => 'map-pin', 'url' => ['/web-berkas-pelamar'],],
                                ['label' => 'Lamaran', 'icon' => 'map-pin', 'url' => ['/web-lamaran'],],
                                ['label' => 'Hasil Seleksi', 'icon' => 'map-pin', 'url' => ['/web-hasil-seleksi'],],
                                ['label' => 'Kategori Seleksi', 'icon' => 'map-pin', 'url' => ['/web-kategori-seleksi'],],
                            ],
                        ],

                        [
                            'label' => 'Data Perusahaan',
                            'icon' => 'building',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Perusahaan', 'icon' => 'building', 'url' => ['/web-perusahaan'],],
                                ['label' => 'Perusahaan Premium', 'icon' => 'map-pin', 'url' => ['/web-user-premium'],],
                                ['label' => 'Transaksi Premium', 'icon' => 'credit-card', 'url' => ['/web-user-premium-transaksi'],],
                                ['label' => 'Lowongan', 'icon' => 'map-pin', 'url' => ['/web-lowongan'],],
                                ['label' => 'Seleksi', 'icon' => 'map-pin', 'url' => ['/web-seleksi'],],
                            ],
                        ],

                        [
                            'label' => 'Data Wilayah',
                            'icon' => 'globe',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Provinsi', 'icon' => 'map', 'url' => ['/web-provinsi'],],
                                ['label' => 'Kota', 'icon' => 'map-pin', 'url' => ['/web-kota'],],
                            ],
                        ],

                        [
                            'label' => 'Data Universitas',
                            'icon' => 'folder',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Universitas', 'icon' => 'university', 'url' => ['/web-univ'],],
                                ['label' => 'Jurusan', 'icon' => 'id-card', 'url' => ['/web-jurusan'],],
                            ],
                        ],

                        [
                            'label' => 'Data Event',
                            'icon' => 'calendar-plus-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Events', 'icon' => 'calendar', 'url' => ['/web-events'],
                                    'active'=> in_array(\Yii::$app->controller->id, ['web-events', 'web-jadwal-events', 'web-tiket-events', 'web-presentasi']) ],
                                ['label' => 'Kategori Stand', 'icon' => 'star', 'url' => ['/web-kategori-stand'],],
                                ['label' => 'Venue', 'icon' => 'map-marker', 'url' => ['/web-venue'],],
                            ],
                        ],

                        [
                            'label' => 'Data Artikel',
                            'icon' => 'archive',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Data Artikel', 'icon' => 'pencil', 'url' => ['/web-artikel'],],
                                ['label' => 'Data Kategori Artikel', 'icon' => 'file', 'url' => ['/web-kategori-artikel'],],
                            ],
                        ],

                        ['label' => 'Pengaturan', 'icon' => 'gear', 'url' => ['/web-setting'] ],
                        ['label' => 'Frontend', 'icon' => 'desktop', 'url' => Yii::$app->request->baseUrl.'/../../' ],

                    ],
                ]
            ) ?>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) --
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="#">Pusat Pengembangan Karir dan Alumni UIN Suska Riau</a>.</strong> All rights reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
