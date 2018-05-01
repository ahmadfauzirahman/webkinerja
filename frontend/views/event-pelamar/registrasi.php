<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/12/2018
 * Time: 10:14 PM
 */
?>
<br><br>
<div class="banner" style="width: 100%;">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails;?>" alt="">
</div>

<div class="section" style="
     background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
padding-top:20px;padding-bottom: 10px;
">
    <div class="row">
        <h2 class="el-title">Prosedur Masuk <?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>

<div class="section" style="padding: 20px">
    <div class="row">
        <ol style="font-size: 20px">
            <li><p>Login di halaman website Suska Karir (<a href="<?= Yii::$app->urlManager->createUrl('site/login') ?> " target="_blank">karir-suska.org</a> ) melalui browser baik itu di PC maupun smartphone milikmu</p></li>
            <li><p>klik menu cetak tiket pada halaman dashboard</p></li>
            <li><p>klik banner event Job Fair</p></li>
            <li><p>QR Code dapat dicetak/print maupun ditunjukan melalui smartphone milikmu</p></li>
            <li><p>Tunjukan QR Code ini pada petugas di pintu masuk job fair</p></li>
        </ol>
    </div>
</div>
