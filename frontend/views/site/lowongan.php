<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<div class="section p-t-30 p-b-30" id="about" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 small-12 column">
            <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">LOWONGAN</p>
                <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;">Temukan Lowongan Pekerjaan Yang Cocok Untuk Anda</h2>
                <div class="clear"></div>
                <p class="m-t-0 m-b-0">Kami menyediakan informasi mengenai berbagai macam lowongan pekerjaan dari berbagai perusahaan.</p>
            </div>
        </div>
    </div>
</div>
<div class="section p-t-30 p-b-60 bg--grey" id="blog" style="background:#ffffff url('images/ppc/ppc_section-bg-01.png') repeat;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
    <div class="row">
        <div class="large-3 column">
            <p class="el-subtitle text-bluedark">Kategori Lowongan</p>
            <div class="divider float-left"></div>
            <div class="clear"></div>
            <p class="m-t-30">
                <?php

                $kL = ['1'=>'Lowongan Kerja','2' => 'Lowongan Magang'];
                foreach($kL AS $klk => $klv){
                    $s = '';
                    if(isset($_GET['LowonganSearch'])){
                        if($_GET['LowonganSearch']['lowonganKategoriLowonganID'] == $klk){
                            $s = 'style="color:#666666;"';
                        } else {

                        }
                    }
                    echo '<a href="'.Yii::$app->urlManager->createUrl(['site/lowongan', 'DashboardLowonganSearch' => ['lowonganKategoriLowonganID' => $klk]]).'" '.$s.'>'.$klv.'</a><br><hr/>';
                }
                $ss = '';
                if(!isset($_GET['LowonganSearch']['lowonganKategoriLowonganID'])) {
                    $ss = 'style="color:#666666;"';
                }
                echo '<a href="' . Yii::$app->urlManager->createUrl(['site/lowongan']) . '" '.$ss.'>Semua Kategori</a><br><hr/>';
                ?>
            </p>
        </div>
        <div class="large-9 column">
            <?php Pjax::begin(); ?>

            <?php echo $this->render('lowongan_search', ['model' => $searchModel]); ?>

            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $provider,
                'options' => [
                    'tag' => 'div',
                    'class' => 'text-center',
                ],
                'itemView' => function($model,$key,$index,$widget){
                    $dP = \common\models\WebPerusahaan\WebPerusahaan::find()->where(['perusahaanID' => $model->lowonganPerusahaanID])->one();
                    $status = \frontend\models\Dashboard\DashboardUserPremium::find()->where(['userID' => $dP->perusahaanUserID])->one()['userPremiumStatus'];
                    ?>
                    <div class="col-lg-12">
                        <div class="card-article-hover card card-lowongan" <?php if($status == 'Aktif'){ echo 'style="border:1px solid #A7D558"'; } ?>>
                            <div class="card-section" style="padding: 10px; padding-top: 20px; margin: 0; width:100%;">
                                <div class="col-lg-8">
                                    <img src="<?= Yii::$app->request->baseUrl ?>./../../backend/web/logoperusahaan/<?= $dP->perusahaanFoto ?>" style="float:left; width:75px; height:75px; margin-right: 15px; border: 5px solid #efefef;" />
                                    <p class="article-desc">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-detail', 'id' => $model->lowonganID])?>">
                                            <?= $model->lowonganNama; ?>
                                        </a>

                                        <br><b><?= $dP['perusahaanNama'] ?></b><br>

                                        <?php $dK = \common\models\WebKota::find()->where(['kotaID' => $dP['perusahaanKotaID']])->one() ?>
                                        <small><?= $dK['kotaNama'] ?> - <?= $dP['perusahaanNegaraID'] ?></small>
                                        <br/>
                                    <div class="clear"></div>
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <?php if(date("Y-m-d") <= $model->lowonganValid){ ?>
                                    <div class="pull-right"><b style="font-size: 15px"><?= date_diff(date_create(date($model->lowonganValid)),date_create())->d ?></b> <small><i>Hari Lagi</i></small></div>
                                    <?php } else { ?>
                                    <div class="pull-right"><small><i>Pendaftaran Ditutup</i></small></div>
                                    <?php } ?>
                                    <div class="clear"></div>
                                    <?php
                                    if($status == 'Aktif'){ echo '<span class="badge badge-success pull-right"><i class="fa fa-star" style="color: yellow;"></i> <b>Premium Company</b> </span>'; }
                                    ?>
                                    <div class="clear"></div><br>
                                    <div class="pull-right">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-detail', 'id' => $model->lowonganID])?>"><b>SELENGKAPNYA</b> <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <?php
                },
                'pager' => [
                        'firstPageLabel' => false,
                        'lastPageLabel' => false,
                        'prevPageLabel' => "<i class='fa fa-chevron-left'></i>",
                        'nextPageLabel' => "<i class='fa fa-chevron-right'></i>",
                ],
            ]) ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>