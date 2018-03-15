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
    <?php $this->endBody() ?>


    <!-- end footer-->
<?php
$js = <<< JS

$(document).ready(function(){
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
});
JS;
$this->registerJs($js);
?>
</body>

</html>
<?php $this->endPage() ?>

