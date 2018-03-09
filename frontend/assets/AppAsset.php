<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/themes1';
    public $css = [
        'css/site.css',
        'assets/libs/font-awesome.css',
        'assets/libs/owl.carousel.min.css',
        'assets/libs/owl.theme.default.min.css',
        'assets/libs/animate.min.css',
        'css/foundation.css',
        'css/styles_foundation.css',
        'css/bootstrap.css',
    ];
    public $js = [
        'assets/libs/jquery.js',
        'assets/libs/foundation.min.js',
        'assets/libs/SmoothScroll.js',
        'assets/libs/jquery.easing.1.3.js',
        'assets/libs/jquery.flexverticalcenter.js',
        'assets/libs/owl.carousel.min.js',
        'assets/libs/scrolla.jquery.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
