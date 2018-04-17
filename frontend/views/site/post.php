<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<div class="section p-t-60 p-b-60" id="about" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-5 small-12 column">
            <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">KATEGORI</p>
                <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;"><?= \common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($idKategori)['kategoriArtikelNama'] ?></h2>
                <div class="divider float-left"></div>
                <div class="clear"></div>
                <p class="m-t-30">Buzzer can help your company increase your brand awareness and build the relationships that will fill the top
                    of your sales funnel. When you have a steady stream of qualified prospects engaged with your brand, your possibilities
                    are limitless! </p>
            </div>
        </div>
        <div class="large-7 small-12 column">
            <div class="block-card-simple">
                <!-- Loops through "images" array -->

                <div class="block-card-simple_item text-center  animate " data-animate="fadeInRight" data-duration="0.5s" data-delay="0.8s"
                     data-offset="10">
                    <div class="block-card-simple_thumb">
                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/card-1.png" />
                    </div>
                    <div class="block-card-simple_title">
                        Pilih
                    </div>
<!--                    <div class="block-card-simple_desc">-->
<!--                        Identify Your Business Problems &amp; Needs-->
<!--                    </div>-->
                </div>

                <div class="block-card-simple_item text-center  animate " data-animate="fadeInRight" data-duration="0.5s" data-delay="1.2s"
                     data-offset="10">
                    <div class="block-card-simple_thumb">
                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/card-2.png" />
                    </div>
                    <div class="block-card-simple_title">
                        Baca
                    </div>
<!--                    <div class="block-card-simple_desc">-->
<!--                        Solution for Your Services or Products-->
<!--                    </div>-->
                </div>

                <div class="block-card-simple_item text-center  animate " data-animate="fadeInRight" data-duration="0.5s" data-delay="1.6s"
                     data-offset="10">
                    <div class="block-card-simple_thumb">
                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/card-3.png" />
                    </div>
                    <div class="block-card-simple_title">
                        Diskusi
                    </div>
<!--                    <div class="block-card-simple_desc">-->
<!--                        Convert Prospects into Paying Customers-->
<!--                    </div>-->
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="section p-t-60 p-b-60 bg--grey" id="blog" style="background:#ffffff url('images/ppc/ppc_section-bg-01.png') repeat;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
    <div class="row">
        <?php $d0 = \common\models\WebArtikel\WebArtikel::find()->where(['artikelKategoriID' => $idKategori])->all();
            foreach($d0 AS $d0Data){
        ?>
        <div class="large-4 column">
            <div class="card-article-hover card">
                <a href="">
                    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/thumbnails/<?= $d0Data->artikelThumbnails ?>" style="height:150px; width:100%">
                </a>
                <div class="card-section">
                    <p class="meta-data article-subtext">
                        <?= date('d F Y',strtotime($d0Data->artikelTglPost)) ?>
<!--                        --><?php //$kategori = \common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($d0Data->artikelKategoriID)['kategoriArtikelNama']; if($kategori != ''){ echo $kategori; } else { echo "Tidak Ada Kategori"; } ?>
                        | 10 MIN READ</p>
                    <a href="?r=site/post-detail&id=<?= $d0Data->artikelID; ?>">
                        <h3 class="article-title"><?= $d0Data->artikelJudul; ?></h3>
                    </a>
                    <p class="article-desc"><?= strip_tags(substr($d0Data->artikelIsi,0,70)); ?>...</p>
                </div>
                <div class="card-divider flex-container align-middle">
                    <img class="avatar" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= \common\models\User::findOne($d0Data->artikelUserID)['foto']; ?>" alt="avatar" style="width: 20px; height: 20px;">
                    <a href=""><small>@<?= \common\models\User::findOne($d0Data->artikelUserID)['username']; ?></small></a>
                </div>
                <div class="hover-border">
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
</section>
