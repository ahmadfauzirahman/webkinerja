<?php
/* @var $this yii\web\View */
?>

<br><br>

<div class="section text-center animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50" style="background: transparent">

    <div class="large-6 column p-t-50">
        <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/jobseeker.png" alt="" style="width: 400px; height: 400px">
        <br> <br>
        <a href="<?= \yii\helpers\Url::to(['event-pelamar/index','id'=>$event->eventsID, 'user'=>'Pelamar'])?>" class="btn btn-lg btn-block btn-success" style="display: inline">Masuk Sebagai Pelamar</a>
    </div>
    <div class="large-6 column ">
        <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/company.png" alt="" style="width: 420px; height: 450px">
        <br><br>
        <a href="<?= \yii\helpers\Url::to(['event-perusahaan/index','id'=>$event->eventsID])?>" class="btn btn-lg btn-block btn-success" style="display: inline">Masuk Sebagai Perusahaan</a>
    </div>
</div>

