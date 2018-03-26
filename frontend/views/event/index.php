<?php
/* @var $this yii\web\View */
?>
<div class="section" style="background: transparent">
    <a href="<?= Yii::$app->urlManager->createUrl('site') ?>">
        <figure class="logo-top">
            <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="height:60px; margin: 6px;">
        </figure>
    </a>
</div>

<div class="section text-center" style="background: transparent">

    <div class="large-6 column p-t-200">
        <a href="<?= \yii\helpers\Url::to(['event-pelamar/index','id'=>$event->eventsID, 'user'=>'Pelamar'])?>" class="btn btn-lg btn-block btn-warning">Masuk Sebagai Pelamar</a>
    </div>
    <div class="large-6 column p-t-200">
        <a href="<?= \yii\helpers\Url::to(['event-perusahaan/index','id'=>$event->eventsID])?>" class="btn btn-lg btn-block btn-warning">Masuk Sebagai Perusahaan</a>
    </div>
</div>

