<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:04 PM
 */
$this->registerCssFile(Yii::$app->request->baseUrl."/css/denah.css");
?>
<br><br>

<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:20px;padding-bottom: 10px;
    ">
    <div class="row">
        <h2 class="el-title">Denah <?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>
<div class="denah text-center" style="padding: 20px; position: relative; width: 1024px; text-align: center">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/ic.png" alt="" style="width: 840px !important; height: 534px !important; margin-left: 235px">


    <div class="kotak kotak2 kiri1 G1 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'5'])->one()){ echo "tersedia";}?>">
        <?php $G1 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'5'])->one()?>
        <div class="my-popover-title" style="display:none;">
            <p class="el-title" style="font-size: 20px"><?= $G1->standsNama;?></p>
                <hr>
            <?php if ($G1->standsPerusahaanID==null):?>
            <p>Fasilitas</p>
            <p style="padding: 10px"><?= $gold->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($G1->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($G1->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'5'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$G1->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kotak2 tengah1 G2 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'6'])->one()){ echo "tersedia";}?>">
        <?php $G2 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'6'])->one()?>
        <div class="my-popover-title" style="display:none; padding: 10px !important;">
                <p class="el-title" style="font-size: 20px"><?= $G2->standsNama;?></p>
            <hr>
            <?php if ($G2->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <?= $gold->kategoriStandFasilitas?>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($G2->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($G2->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'6'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$G2->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kotak2 kanan1 G3 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'7'])->one()){ echo "tersedia";}?>">
        <?php $G3 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'7'])->one()?>
        <div class="my-popover-title" style="display:none;">
                <p class="el-title" style="font-size: 20px"><?= $G3->standsNama;?></p>
            <hr>
            <?php if ($G3->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $gold->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($G3->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($G3->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'7'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$G3->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri1 A1 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'8'])->one()){ echo "tersedia";}?>">
        <?php $A1 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'8'])->one()?>
        <div class="my-popover-title" style="display:none;">
                <p class="el-title" style="font-size: 20px"><?= $A1->standsNama;?></p>
            <hr>
            <?php if ($A1->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A1->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A1->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'8'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A1->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri1 A2 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'9'])->one()){ echo "tersedia";}?>">
        <?php $A2 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'9'])->one()?>
        <div class="my-popover-title" style="display:none;">
                <p class="el-title" style="font-size: 20px"><?= $A2->standsNama;?></p>
                <hr>
                <?php if ($A2->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                    <?php $perusahaan = \common\models\WebPerusahaan::findOne($A2->standsPerusahaanID);?>
                    <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A2->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'9'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A2->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri1 A3 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'10'])->one()){ echo "tersedia";}?>">
        <?php $A3 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'10'])->one()?>
        <div class="my-popover-title" style="display:none;">

                <p class="el-title" style="font-size: 20px"><?= $A3->standsNama;?></p>
                <hr>
                <?php if ($A3->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                    <?php $perusahaan = \common\models\WebPerusahaan::findOne($A3->standsPerusahaanID);?>
                    <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A3->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'10'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A3->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri2 A4 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'11'])->one()){ echo "tersedia";}?>">
        <?php $A4 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'11'])->one()?>
        <div class="my-popover-title" style="display:none;">
                <p class="el-title" style="font-size: 20px"><?= $A4->standsNama;?></p>
                <hr>
                <?php if ($A4->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                    <?php $perusahaan = \common\models\WebPerusahaan::findOne($A4->standsPerusahaanID);?>
                    <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A4->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'11'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A4->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri2 A5 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'12'])->one()){ echo "tersedia";}?>">
        <?php $A5 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'12'])->one()?>
        <div class="my-popover-title" style="display:none;">
                <p class="el-title" style="font-size: 20px"><?= $A5->standsNama;?></p>
                <hr>
                <?php if ($A5->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                    <?php $perusahaan = \common\models\WebPerusahaan::findOne($A5->standsPerusahaanID);?>
                    <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A5->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'12'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A5->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kiri2 A6 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'13'])->one()){ echo "tersedia";}?>">
        <?php $A6 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'13'])->one()?>
        <div class="my-popover-title" style="display:none;">
            <p class="el-title" style="font-size: 20px"><?= $A6->standsNama;?></p>
            <hr>
            <?php if ($A6->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A6->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A6->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'13'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A6->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah1 A7 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'14'])->one()){ echo "tersedia";}?>">
        <?php $A7 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'14'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A7->standsNama;?></p>
            <hr>
            <?php if ($A7->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A7->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A7->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'14'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A7->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah1 A8 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'15'])->one()){ echo "tersedia";}?>">
        <?php $A8 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'15'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A8->standsNama;?></p>
            <hr>
            <?php if ($A8->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A8->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A8->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'15'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A8->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah1 A9 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'16'])->one()){ echo "tersedia";}?>">
        <?php $A9 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'16'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A9->standsNama;?></p>
            <hr>
            <?php if ($A9->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A9->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A9->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'16'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A9->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah2 A10 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'17'])->one()){ echo "tersedia";}?>">
        <?php $A10 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'17'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A10->standsNama;?></p>
            <hr>
            <?php if ($A10->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A10->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A10->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'17'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A10->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah2 A11 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'18'])->one()){ echo "tersedia";}?>">
        <?php $A11 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'18'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A11->standsNama;?></p>
            <hr>
            <?php if ($A11->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A11->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A11->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'18'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A11->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak tengah2 A12 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'19'])->one()){ echo "tersedia";}?>">
        <?php $A12 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'19'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A12->standsNama;?></p>
            <hr>
            <?php if ($A12->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A12->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A12->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'19'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A12->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan1 A13 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'20'])->one()){ echo "tersedia";}?>">
        <?php $A13 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'20'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A13->standsNama;?></p>
            <hr>
            <?php if ($A8->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A13->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A13->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'20'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A13->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan1 A14 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'21'])->one()){ echo "tersedia";}?>">
        <?php $A14 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'21'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A14->standsNama;?></p>
            <hr>
            <?php if ($A14->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A14->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A14->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'21'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A14->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan1 A15 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'22'])->one()){ echo "tersedia";}?>">
        <?php $A15 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'22'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A8->standsNama;?></p>
            <hr>
            <?php if ($A15->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A15->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A15->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'22'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A15->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan2 A16 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'23'])->one()){ echo "tersedia";}?>">
        <?php $A16 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'23'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A16->standsNama;?></p>
            <hr>
            <?php if ($A16->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A16->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A16->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'23'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A16->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan2 A17 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'24'])->one()){ echo "tersedia";}?>">
        <?php $A17 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'24'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A17->standsNama;?></p>
            <hr>
            <?php if ($A17->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A17->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A17->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'24'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A17->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>

    <div class="kotak kanan2 A18 <?php if (!\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'25'])->one()){ echo "tersedia";}?>">
        <?php $A18 = \common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID, 'standsID'=>'25'])->one()?>
        <div class="my-popover-title" style="display:none;">

            <p class="el-title" style="font-size: 20px"><?= $A18->standsNama;?></p>
            <hr>
            <?php if ($A18->standsPerusahaanID==null):?>
                <p>Fasilitas</p>
                <p><?= $standart->kategoriStandFasilitas?></p>

            <?php else:?>
                <?php $perusahaan = \common\models\WebPerusahaan::findOne($A18->standsPerusahaanID);?>
                <img class="avatar" style=" width: 150px; height: 150px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $perusahaan->perusahaanFoto; ?>" alt="avatar">
            <?php endif;?>
        </div>
        <?php if($A18->standsPerusahaanID==null):?>
            <?php if (\common\models\WebBooking::find()->where(['bookingEventsID'=>$event->eventsID,'bookingStandsID'=>'25'])->one()) :?>
                <div class="my-popover-content" style="display:none;">
                    <p class="alert alert-warning">Maaf, stand sudah dibooking</p>
                </div>
            <?php else: ?>
                <div class="my-popover-content" style="display:none;">
                    <a href="<?= \yii\helpers\Url::to(['event-perusahaan/booking', 'id'=>$event->eventsID, 'id2'=>$A18->standsID])?>" class="btn btn-primary" style="display: block">Book</a>
                </div>
            <?php endif;?>
        <?php endif;?>
</div>
</div>
<div class="section" style="padding: 20px">
    <div class="row">


    </div>
    <div class="row">
        <hr>
        <h2 class="el-title">Daftar Perusahaan</h2>
        <div class="divider float-left"></div>
        <br>
        <?php $kategori = \common\models\WebStands::find()->select(['standsKategoriStandID'])->where(['standsEventsID'=>$event->eventsID])->groupBy(['standsKategoriStandID'])->all() ?>
        <?php foreach ($kategori as $data):?>
            <h3 class="el-subtitle"><?php $a = \common\models\WebKategoriStand::findOne($data->standsKategoriStandID); echo $a->kategoriStandNama?></h3>
            <div class="divider float-left"></div>
            <div class="clearfix"></div>
            <br>
                <?php foreach (\common\models\WebStands::find()->where(['standsEventsID'=>$event->eventsID,'standsKategoriStandID'=>$data->standsKategoriStandID])->all() as $data2):?>
                <div class="col-md-4">
                    <?php
                        if($data2->standsPerusahaanID==""){?>
                            <p style="font-size: 17px;"><?= $data2->standsNama.". tersedia" ?></p>
                            <?php
                        }else{?>
                            <p style="font-size: 17px;"><?= $data2->standsNama.". <b>".\common\models\WebPerusahaan::findOne($data2->standsPerusahaanID)['perusahaanNama']."</b>" ?></p>
                            <?php
                        }
                    ?>

                </div>

                <?php endforeach;?>



        <?php endforeach;?>
    </div>
</div>


<?php

$script = <<< JS
    jQuery.noConflict();
    $(document).ready(function () {
                   
                    $('.kotak').popover({
                        html : true,
                        trigger : 'manual',
                        placement : 'top',
                        animation: false,
                        title: function () {
                                return $(this).children('.my-popover-title').html();
                            },
                        content : function(){
                            return $(this).children('.my-popover-content').html();
                        }
                    }).on("mouseenter", function(){
                        var _this = this;
                        $(this).popover("show");
                        $(this).siblings(".popover").on("mouseleave", function () {
                                $(_this).popover('hide');
                            });
                    }).on("mouseleave", function () {
                            var _this = this;
                            setTimeout(function () {
                                if (!$(".popover:hover").length) {
                                    $(_this).popover("hide")
                                }
                            }, 100);
                        });

                   
                });
JS;
$this->registerJs($script);
?>


