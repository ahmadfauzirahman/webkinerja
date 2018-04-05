<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 2:42 PM
 */
?>

<br><br>

<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:50px;padding-bottom: 20px;
    ">


    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50" style="background: white; padding: 10px">
        <?php \yii\widgets\Pjax::begin(); ?>

        <?php echo $this->render('pencarian_search', ['model' => $searchModel]); ?>

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
        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>
