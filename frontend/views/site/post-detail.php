<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<div class="section p-t-60 p-b-60 bg--grey" id="about" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 small-12 column">
            <div class="el-content">
                <br>
                <br>
                <p class="el-subtitle"><?= strtoupper(\common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($data->artikelKategoriID)['kategoriArtikelNama']) ?></p>
                <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;"><?= $data->artikelJudul; ?></h2>
                <div class="divider float-left"></div>
                <br>
                <p class="text-small">
                <ul class="float-right sosmed-share m-l-20">
                    <li>Bagikan dengan: </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                </ul>
                <b><i><img class="avatar" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= \common\models\User::findOne($data->artikelUserID)['foto']; ?>" alt="avatar" style="width: 50px; height: 50px;">
                        <?= ucwords(\common\models\User::findOne($data->artikelUserID)['nama']); ?></i></b>
                        - <?= date('d F Y',strtotime($data->artikelTglPost)) ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="section p-t-60 p-b-60" id="about">
    <div class="row">
        <div class="large-8 small-12 column">
            <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/thumbnails/<?= $data->artikelThumbnails ?>" style="width:100%; height:auto; max-height: 500px; margin-bottom:20px; border: 10px solid #efefef;" />
                <p class="m-t-30"><?= $data->artikelIsi; ?>
                </p>
            </div>
        </div>
        <div class="large-4 small-12 column">
            <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <?php

                $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where('kategoriArtikelID = '.$data->artikelKategoriID)->all();
                foreach($d0 AS $d0Data){
                    ?>
                    <p class="el-subtitle text-bluedark"><?= strtoupper($d0Data->kategoriArtikelNama) ?> Lainnya</p>
                    <div class="divider float-left"></div>
                    <div class="clear"></div>
                    <p class="m-t-30">
                    <?php
                    $d1 = \common\models\WebArtikel\WebArtikel::find()->where(['artikelKategoriID' => $d0Data->kategoriArtikelID])->orderBy(['artikelID' => SORT_DESC])->limit(3)->all();
                    foreach($d1 AS $d1Data){
                        ?>
                    <div class="side-link">
                        <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/thumbnails/<?= $d1Data->artikelThumbnails ?>" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                        <a href="?r=site/post-detail&id=<?= $d1Data->artikelID ?>">
                            <?= $d1Data->artikelJudul ?>
                        </a>
                        <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                    </div>
                        <?php
                    }
                    ?>
                    </p>
                    <br/>
                    <?php
                }
                ?>
                <?php

                $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->where('kategoriArtikelID != '.$data->artikelKategoriID)->all();
                foreach($d0 AS $d0Data){
                    ?>
                    <p class="el-subtitle text-bluedark"><?= strtoupper($d0Data->kategoriArtikelNama) ?> Lainnya</p>
                    <div class="divider float-left"></div>
                    <div class="clear"></div>
                    <p class="m-t-30">
                        <?php
                            $d1 = \common\models\WebArtikel\WebArtikel::find()->where(['artikelKategoriID' => $d0Data->kategoriArtikelID])->orderBy(['artikelID' => SORT_DESC])->limit(3)->all();
                            foreach($d1 AS $d1Data){
                                ?>
                    <div class="side-link">
                                <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/thumbnails/<?= $d1Data->artikelThumbnails ?>" style="float:left; width:70px; height:70px; margin:10px; border: 5px solid #efefef;" />
                                <a href="?r=site/post-detail&id=<?= $d1Data->artikelID ?>">
                                <?= $d1Data->artikelJudul ?>
                                </a>
                                    <hr style="border:0; border-top:1px dotted #dddddd; margin-bottom: 0;"/>
                    </div>
                                <?php
                            }
                        ?>
                    </p>
                    <br/>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
