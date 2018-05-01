<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:04 PM
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
            <p>Untuk melancarkan proses booking stand job fair ini, ada baiknya Anda mengikuti prosedur berikut.</p>
            <li><p>Klik tombol booking stand dibawah ini</p></li>
            <p><a href="" class="btn btn-success btn-lg">Booking Stand</a></p>
            <li><p>Muncul denah stand Suska Karir UIN Suska. Pilih booth kosong(Kotak dengan border warna merah) sesuai kebutuhan Anda. Selanjutnya didalam kotak dialog, klik tombol "BOOK".</p></li>
            <li><p>Login</p></li>
            <li><p>Isi formulir booking stand dan klik submit</p></li>
            <li><p>Pemesanan booth Anda berhasil. Tim kami akan segera menghubungi Anda maksimal 1x24 jam (pada hari kerja).</p></li>
        </ol>
    </div>
</div>
