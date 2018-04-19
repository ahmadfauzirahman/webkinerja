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
    <!-- Menu -->
    <?php include 'component/menu.php'; ?>
</div>
<div class="off-canvas-content  is-sticky-wrapper  header-05-center    " data-off-canvas-content>
    <div id="home"></div>
    <!-- start content -->
    <?php include 'component/header.php'; ?>
    <?php $this->beginBody() ?>
    <?= $content ?>


    <!-- end contact -->
<!--    --><?php //include 'component/footer.php'; ?>
</div>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/libs/jquery.js"></script>
<?php $this->endBody() ?>
<?php include 'component/js.php'; ?>
</body>

</html>
<?php $this->endPage() ?>
