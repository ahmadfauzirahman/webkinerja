<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<!--    <div class="section-content block block-client p-t-30" style="padding-top:40px !important;">-->
<!--        <div class="owl-slider-logo owl-carousel owl-theme">-->
<!--            --><?php
//            $data = Yii::$app->db->createCommand("SELECT a.*,b.* FROM web_perusahaan a, web_user_premium b WHERE a.perusahaanUserID=b.userID AND b.userPremiumStatus='Aktif' AND a.perusahaanStatus='Aktif' AND (now() <= b.userPremiumAkhir)")->queryAll();
//            foreach($data AS $c){
//            ?>
<!--            <div class="item">-->
<!--                <div class="block-client_item text-center">-->
<!--                    <figure class="block-client_item-image">-->
<!--                        --><?php //if($c['perusahaanFoto'] == ''){ ?>
<!--                            <img style="height: 100px; width: 260px;" src="--><?//= Yii::$app->request->baseUrl ?><!--/../../backend/web/logoperusahaan/thumbs.png" alt="thumbnails">-->
<!--                        --><?php //} else { ?>
<!--                            <img style="height: 100px; width: 260px;" src="--><?//= Yii::$app->request->baseUrl ?><!--/../../backend/web/logoperusahaan/--><?//= $c['perusahaanFoto']; ?><!--" alt="thumbnails">-->
<!--                        --><?php //} ?>
<!--                    </figure>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //} ?>
<!---->
<!--        </div>-->
<!--    </div>-->
    <section id="slider-01">
        <div class="owl-slider-04 owl-carousel owl-theme">
            <div class="item owl-bg cover-bg" style="background:linear-gradient(rgba(20,20,20,0.20), rgba(20,20,20,0.50)), url('http://via.placeholder.com/1920x599')">
                <div cass="container">
                    <div class="row">
                        <div class="large-8 column large-centered">
                            <div class="owl-slide-content_text text-center p-t-100">
                                <h3 class="owl-slide-content_text-title fs-50">
                                    Helping You Reach
                                    <br>the Right Social Audience.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item owl-bg cover-bg" style="background:linear-gradient(rgba(20,20,20,0.20), rgba(20,20,20,0.50)), url('http://via.placeholder.com/1920x599')">
                <div cass="container">
                    <div class="row">
                        <div class="large-8 column large-centered">
                            <div class="owl-slide-content_text text-center p-t-100">
                                <h3 class="owl-slide-content_text-title fs-50">
                                    Helping You Reach
                                    <br>the Right Social Audience.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item owl-bg cover-bg" style="background:linear-gradient(rgba(20,20,20,0.20), rgba(20,20,20,0.50)), url('http://via.placeholder.com/1920x599')">
                <div cass="container">
                    <div class="row">
                        <div class="large-8 column large-centered">
                            <div class="owl-slide-content_text text-center p-t-100">
                                <h3 class="owl-slide-content_text-title fs-50">
                                    Helping You Reach
                                    <br>the Right Social Audience.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main slide sosmed -->
    <div class="section p-t-30 p-b-30" id="about">
        <div class="row">
            <div class="large-4 small-12 column">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                        <p class="el-subtitle text-bluedark">Lowongan Terbaru</p>
                        <div class="divider float-left"></div>
                        <br>
                        <div class="clear"></div>
                        <?php
                            $lowonganTerbaru = \frontend\models\Dashboard\DashboardLowongan::find()->where(['lowonganStatus' => 'Aktif'])->orderBy(['lowonganID' => SORT_DESC])->limit(5)->all();
                            foreach($lowonganTerbaru AS $lT){
                                $dP = \common\models\WebPerusahaan\WebPerusahaan::find()->where(['perusahaanID' => $lT->lowonganPerusahaanID])->one();
                                ?>
                                <div class="side-link">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-detail', 'id' => $lT->lowonganID])?>">
                                    <img src="<?= Yii::$app->request->baseUrl ?>./../../backend/web/logoperusahaan/<?= $dP->perusahaanFoto ?>" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                    <?php if(date("Y-m-d") <= $lT->lowonganValid){ ?>
                                    <div class="pull-right"><b style="font-size: 15px"><?= date_diff(date_create(date($lT->lowonganValid)),date_create())->d ?></b><br><small><i>Hari<br>Lagi</i></small></div>
                                    <?php } else { ?>
                                    <div class="pull-right"><small><i>Pendaftaran<br>Ditutup</i></small></div>
                                    <?php } ?>
                                    <p style="padding-top:10px;">
                                          <?= $lT->lowonganNama; ?>


                                        <br><b style="color:#537238;"><?= $dP['perusahaanNama'] ?></b><br>
                                        <?php $dK = \common\models\WebKota::find()->where(['kotaID' => $dP['perusahaanKotaID']])->one() ?>
                                        <small><?= $dK['kotaNama'] ?> - <?= $dP['perusahaanNegaraID'] ?></small><br/>
                                    </p>
                                    </a>
                                    <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                                </div>
                                <?php
                            }
                        ?>
                </div>
            </div>
            <div class="large-4 small-12 column">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                    <p class="el-subtitle text-bluedark">Lowongan Rekomendasi</p>
                        <div class="divider float-left"></div>
                        <br>
                        <div class="clear"></div>
                    <?php
                    $lowonganTerbaru2 = \frontend\models\Dashboard\DashboardLowongan::find()->where(['lowonganStatus' => 'Aktif'])->orderBy(['lowonganID' => SORT_DESC])->all();
                    $n = 1;
                    foreach($lowonganTerbaru2 AS $lT){
                        if($n <= 5) {
                            $dP = \common\models\WebPerusahaan\WebPerusahaan::find()->where(['perusahaanID' => $lT->lowonganPerusahaanID])->one();
                            $status = \frontend\models\Dashboard\DashboardUserPremium::find()->where(['userID' => $dP->perusahaanUserID])->one()['userPremiumStatus'];
                            if ($status == 'Aktif') {
                                $n++;
                                ?>
                                <div class="side-link">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-detail', 'id' => $lT->lowonganID]) ?>">
                                        <img src="<?= Yii::$app->request->baseUrl ?>./../../backend/web/logoperusahaan/<?= $dP->perusahaanFoto ?>"
                                             style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;"/>
                                        <?php if (date("Y-m-d") <= $lT->lowonganValid) { ?>
                                            <div class="pull-right"><b
                                                        style="font-size: 15px"><?= date_diff(date_create(date($lT->lowonganValid)), date_create())->d ?></b><br>
                                                <small><i>Hari<br>Lagi</i></small>
                                            </div>
                                        <?php } else { ?>
                                            <div class="pull-right">
                                                <small><i>Pendaftaran<br>Ditutup</i></small>
                                            </div>
                                        <?php } ?>
                                        <p style="padding-top:10px;">
                                            <?= $lT->lowonganNama; ?>


                                            <br><b style="color:#537238;"><?= $dP['perusahaanNama'] ?></b><br>
                                            <?php $dK = \common\models\WebKota::find()->where(['kotaID' => $dP['perusahaanKotaID']])->one() ?>
                                            <small><?= $dK['kotaNama'] ?> - <?= $dP['perusahaanNegaraID'] ?></small>
                                            <br/>
                                        </p>
                                    </a>
                                    <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="large-4 small-12 column">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                        <p class="el-subtitle text-bluedark">Event Akan Datang
                        <div class="divider float-left"></div>
                        <br>
                        <div class="clear"></div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                            <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site#">
                                    Yii 1.1: Creating and updating model and its related models in one form, inc. image
                                </a>
                                <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                            </div>
                        </p>
                </div>
            </div>

        </div>
    </div>
    <!-- end standard-03 -->
    <div id="expertise" class="section p-t-60 p-b-60 bg--grey" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/bg-section-socmed.png');
    background-repeat: no-repeat;
    background-position: bottom center;
    padding-bottom:100px;
    ">
        <div class="row">
            <div class="large-8 medium-12 small-12 large-centered column">
                <div class="el-content text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <p class="el-subtitle">300+ Perusahaan telah menjadi client kami</p>
                    <h2 class="el-title">Bergabunglah Bersama Kami</h2>
                    <div class="divider"></div>
                    <div class="clear"></div>
                    <p class="m-t-30">Sistem kami dapat membantu perusahaan anda dalam menyediakan tenaga kerja yang kompetent sesuai spesifikasi yang perusahaan anda butuhkan:</p>
                </div>
            </div>
            <br>
            <br>
            <div style="padding-top:0 !important;" class="text-center">
                <div class="owl-slider-logo owl-carousel owl-theme text-center">

                    <?php
                    $data = Yii::$app->db->createCommand("SELECT a.* FROM web_perusahaan a WHERE a.perusahaanStatus='Aktif'")->queryAll();
                    foreach($data AS $c){
                        ?>
                        <div class="item">
                            <div class="block-client_item text-center">
                                <figure class="block-client_item-image text-center">
                                    <?php if($c['perusahaanFoto'] == ''){ ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/thumbs.png" alt="thumbnails">
                                    <?php } else { ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $c['perusahaanFoto']; ?>" alt="thumbnails">
                                    <?php } ?>
                                </figure>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data = Yii::$app->db->createCommand("SELECT a.* FROM web_perusahaan a WHERE a.perusahaanStatus='Aktif'")->queryAll();
                    foreach($data AS $c){
                        ?>
                        <div class="item">
                            <div class="block-client_item text-center">
                                <figure class="block-client_item-image text-center">
                                    <?php if($c['perusahaanFoto'] == ''){ ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/thumbs.png" alt="thumbnails">
                                    <?php } else { ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $c['perusahaanFoto']; ?>" alt="thumbnails">
                                    <?php } ?>
                                </figure>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data = Yii::$app->db->createCommand("SELECT a.* FROM web_perusahaan a WHERE a.perusahaanStatus='Aktif'")->queryAll();
                    foreach($data AS $c){
                        ?>
                        <div class="item">
                            <div class="block-client_item text-center">
                                <figure class="block-client_item-image text-center">
                                    <?php if($c['perusahaanFoto'] == ''){ ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/thumbs.png" alt="thumbnails">
                                    <?php } else { ?>
                                        <img style="height: 100px; width: 110px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $c['perusahaanFoto']; ?>" alt="thumbnails">
                                    <?php } ?>
                                </figure>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- end tabs vertical -->
        <div class="section p-t-60 p-b-60" id="service" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
            <div class="row">
                <div class="large-12 column">
                    <div class="section-header text-left">
                        <p class="el-subtitle">outlining YOUR MARKETING plans</p>
                        <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;">Content Marketing Tactital Plan</h2>
                        <div class="divider float-left"></div>
                        <div class="clear"></div>
                        <p class="el-desc m-t-30">We assess our clients' image and provide tactical planning that inspire the audience to get involved and take
                            action.</p>
                    </div>
                    <div class="section-content m-t-30 text-center">
                        <div class="row large-up-6 medium-up-4 small-up-2 content-service m-b-30" data-equalizer data-equalize-by-row="true">
                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item active">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">Social Network</h5>
                                </div>
                            </div>

                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">Website Article</h5>
                                </div>
                            </div>

                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">In-Person Event</h5>
                                </div>
                            </div>

                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">eNewsletter</h5>
                                </div>
                            </div>

                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">Case Studies</h5>
                                </div>
                            </div>

                            <div class="column" data-equalizer-watch>
                                <div class="content-service_item">
                                    <div class="el-icon p-t-15">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" width="125">
                                    </div>
                                    <h5 class="el-title">Blogs</h5>
                                </div>
                            </div>
                        </div>

                        <p class="fs-13">
                            <a href="" class="text-uppercase fs-13">
                                <strong>Load more +</strong>
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- enc content marketing service -->
    </div>


    <!-- end list service -->
    <!-- end cta fullwidth -->
    <!-- end table pricing -->
    <section class="section p-t-60 p-b-60 bg--grey blog-grid" id="blog" style="background:#ffffff url('images/ppc/ppc_section-bg-01.png') repeat;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
        <div class="row">
            <div class="large-2 column">
                <div class="section-header   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <p class="el-subtitle">Terbaru.</p>
                    <h2 class="el-title">Blog.</h2>
                    <div class="divider float-left"></div>
                    <div class="clear"></div>
                    <div class="section-header_desc p-t-10 p-b-30">
                        <p>We work with our clients to create online strategies that produce more traffic, more leads, and more business.
                        </p>
                        <?php   foreach(\common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->all() AS $d){ ?>
                            <hr style="border:0; border-top:1px dotted #dddddd;"/>
                            <a href="?r=site/post&kategori=<?= $d->kategoriArtikelID ?>"><?= $d->kategoriArtikelNama ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="large-10 column">
                <div class="row">
                    <?php
                    $data = \common\models\WebArtikel\WebArtikel::find()->orderBy(['artikelID' => SORT_DESC])->limit(3)->all();
                    foreach($data AS $d){
                        ?>
                        <div class="large-4 column">
                            <div class="card-article-hover card   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.4s" data-offset="50">
                                <a href="?r=site/post-detail&id=<?= $d->artikelID ?>">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/thumbnails/<?= $d->artikelThumbnails; ?>" style="height:150px; width:100%">
                                </a>
                                <div class="card-section">
                                    <p class="meta-data article-subtext">
                                        <?php $kategori = \common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($d->artikelKategoriID)['kategoriArtikelNama']; if($kategori != ''){ echo $kategori; } else { echo "Tidak Ada Kategori"; } ?>
                                        <br/><span class="fs-9"><?= date('d F Y',strtotime($d->artikelTglPost)); ?></span>
                                    </p>
                                    <a href="?r=site/post-detail&id=<?= $d->artikelID ?>">
                                        <h3 class="article-title  fs-18"><?= $d->artikelJudul; ?></h3>
                                    </a>
                                    <p class="article-desc"><?= strip_tags(substr($d->artikelIsi,0,70)); ?>...</p>
                                </div>
                                <div class="card-divider flex-container align-middle">
                                    <img class="avatar" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= \common\models\User::findOne($d->artikelUserID)['foto']; ?>" alt="avatar" style="width: 20px; height: 20px;">
                                    <a href="#"><small>@<?= \common\models\User::findOne($d->artikelUserID)['username']; ?></small></a>
                                </div>
                                <div class="hover-border">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>
    <!-- end blog -->
    <!-- cta fullwidth -->
    <div class="section bg--grey p-b-40 p-t-40">
        <div class="row">
            <div class="large-9 small-12 column">
                <div class="media-object bg--grey m-t-15">
                    <div class="media-object-section  el-icon  p-r-30">
                        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/icons/socmed-2/comments.svg" width="80">
                    </div>
                    <div class="media-object-section">
                        <h4 class="el-title">Choosing The Right Social Media Strategy For Your Business</h4>
                        <p class="el-desc">Partner with us No Obligations. Just Deliver High Social Media Quality.</p>
                    </div>
                </div>
            </div>
            <div class="large-3 small-12 column">
                <a href="#features" class="button m-t-15 m-b-5 expanded -rounded warning">Start a Project</a>
            </div>
        </div>
    </div>
    <!-- end cta fullwidth -->
