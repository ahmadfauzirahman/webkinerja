<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    </style>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png"/>
</head>
<body>
<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>
    <!-- Menu -->
    <ul class="menu vertical" data-accordion-menu>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site') ?>">Home</a>
        </li>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site/lowongan') ?>">Lowongan</a>
        </li>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site/event') ?>">Events</a>
        </li>
        <?php

            $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->all();
            foreach($d0 AS $d0Data){
        ?>
                <li>
                    <a href="?r=site/post&kategori=<?=$d0Data->kategoriArtikelID ?>"><?= $d0Data->kategoriArtikelNama ?></a>
                </li>
        <?php
            }

        ?>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site/developer') ?>">Team Developer</a>
        </li>
    </ul>
</div>
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
                                <a href="#"><?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteDescription']); ?></a>
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
                            <a href="<?= Yii::$app->urlManager->createUrl('site') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('site/lowongan') ?>">Lowongan</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('site/event') ?>">Events</a>
                        </li>
                        <?php

                        $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->all();
                        foreach($d0 AS $d0Data){
                            ?>
                            <li>
                                <a href="?r=site/post&kategori=<?=$d0Data->kategoriArtikelID ?>"><?= $d0Data->kategoriArtikelNama ?></a>
                            </li>
                            <?php
                        }

                        ?>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('site/developer') ?>">Team Developer</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>

    <!-- end contact -->
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
</div>
<?php
$js = <<< JS

     $('.animate').scrolla({
      mobile: true, // disable animation on mobiles
      once: true // only once animation play on scroll
    });
  
    /* vertical center */
    $('.vcenter').flexVerticalCenter({
      cssAttribute: 'padding-top'
    });

    /* foundation main */
    $(document).foundation();
    $('.off-canvas a').on('click', function () {
      $('.off-canvas').foundation('close');
    });

    // career page collapse
    $('.career-item_header-button').click(function () {
      $(this).parent().parent().find('.career-item_content').slideToggle('active');
    });

    // owl carousel
    $(document).ready(function () {
      $('.main-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });

      $('.team-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        },
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
      });
    });

    $('.owl-slider-01').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-02').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-03').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-04').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-05').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-logo').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 5,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
      responsiveClass: true,
      responsive: {
        0: {
          items: 2,
          nav: true
        },
        600: {
          items: 2,
          nav: false
        },
        1000: {
          items: 5,
          nav: true,
          loop: false
        }
      }
    });

JS;
$this->registerJs($js);
?>
<script id="dsq-count-scr" src="//arifkynpa.disqus.com/count.js" async></script>
</body>

</html>
<?php $this->endPage() ?>
