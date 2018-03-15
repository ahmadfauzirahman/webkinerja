<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<div id="expertise" class="section p-t-50 " style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-bottom:50px;
    ">
    <div class="row">
        <div class="large-10 medium-12 small-12 column">
            <div class="el-content   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">EVENT</p>
                <h1 class="el-title">Suska Karir.</h1>
                <div class="divider float-left"></div>
                <p class="m-t-30">Suska Karir adalah event regular yang dilaksanakan oleh ECC UGM yang bersifat gratis untuk seluruh pengunjung. ECC UGM bekerjasama dengan banyak perusahaan dan pencari kerja dalam satu waktu dan tempat yang sama. Career Days UGM juga memberi sinergi kuat antara pihak Akademik, Bisnis dan Pemerintah dalam bidang pencarian tenaga kerja, penelitian, pendidikan dan pengembangan diri.
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<section class="section p-t-30 p-b-30  bg--grey blog-grid" id="blog" style="background:#ffffff;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
    <div class="row">
        <div class="large-11 large-centered text-center column" style="padding-bottom: 150px">
            <div class="section-header   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <a href="<?= \yii\helpers\Url::to(['event/index', 'id'=>$event->eventsID])?>"><img class="content-centered" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails; ?>" alt="avatar" style="width: 1000px; height: 400px"></a>
                <h1 class="el-title"><?= date('d', strtotime($event->eventsTanggalMulai))." - ". date('d F Y', strtotime($event->eventsTanggalSelesai))." , ". $event->eventsLokasi." | +-".$stand_count." Perusahaan | 100% GRATIS" ?></h1>
                <div class="divider"></div>
            </div>
        </div>

    </div>

</section>