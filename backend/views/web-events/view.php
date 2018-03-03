<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = $model->eventsJudul;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-view" >
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="info-box">
                <a href="<?= \yii\helpers\Url::to(['web-jadwal-events/index', 'id' => $model->eventsID])?>"> <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">JADWAL EVENT</span>
                    <span class="info-box-number"><?= $jadwal_count?></span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <a href="<?= \yii\helpers\Url::to(['update', 'id' => $model->eventsID])?>"> <span class="info-box-icon bg-blue"><i class="fa fa-address-book-o"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">STAND BOOKING</span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <a href="<?= \yii\helpers\Url::to(['web-tiket-events/index', 'id' => $model->eventsID])?>"> <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">Peserta</span>
                    <span class="info-box-number"><?= $tiket_count?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <a href="<?= \yii\helpers\Url::to(['web-presentasi/index', 'id' => $model->eventsID])?>"> <span class="info-box-icon bg-red"><i class="fa fa-anchor"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">JADWAL</span>
                    <span class="info-box-text">PRESENTASI</span>
                    <span class="info-box-number"><?= $jadwal_presentasi_count?></span>
                </div>
            </div>
        </div>
    </div>


        <div class="col-md-2 col-md-offset-10">

            <?= Html::a('Update', ['update', 'id' => $model->eventsID], ['class' => 'btn btn-primary btn-md']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->eventsID], [
                'class' => 'btn btn-danger btn-md',
                'data' => [
                    'confirm' => 'Apakah Anda Yakin Menghapus Data ini?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>


    <br>

<div class="col-md-7" style="border-right: 1px solid whitesmoke">
    <h4>Detail Event</h4>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eventsID',
            'eventsJudul:ntext',
            'eventsTanggalMulai:date',
            'eventsTanggalSelesai:date',
            'eventsLokasi:ntext',
            'eventsKeterangan:ntext',
            'eventsStatus',
            [
                'label' => 'Thumbnails',
                'format' => 'raw',
                'value' => '<button type="button" class="btn btn-default"
            data-toggle="modal"
            data-target="#foto-' . $model->eventsID . '"><img src="foto_events/' . $model->eventsThumbnails . '" width="30px" height="30px"/></button>

<div class="modal fade " id="foto-' . $model->eventsID. '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center" id="exampleModalLabel">' . $model->eventsJudul . '</h2>
      </div>
      <div class="modal-body text-center">
            <img src="foto_events/' . $model->eventsThumbnails . '" width="800px"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
',
            ],
        ],
    ]) ?>
</div>

        <div class="col-md-5">

            <h4>Jadwal Acara</h4>
            <ul class="timeline">
                <!-- timeline time label -->
                <?php
                if ($jadwal):
                foreach ($jadwal AS $item):?>
                <li class="time-label">
                <span class="bg-light-blue">
                    <?= date('d F Y', strtotime($item->jadwalEventsTglMulai))?> - <?= date('d F Y', strtotime($item->jadwalEventsTglSelesai))?>
                </span>
                </li>
                <!-- /.timeline-label -->

                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><?= $item->jadwalEventsNama?></h3>
                    </div>
                </li>
                <!-- END timeline item -->

                <?php
                endforeach;
                endif;
                ?>



            </ul>
        </div>



</div>



