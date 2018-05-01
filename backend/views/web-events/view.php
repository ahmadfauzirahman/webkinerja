<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = $model->eventsJudul;
$this->params['breadcrumbs'][] = ['label' => 'sdfdsf', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('nav-event');?>
<nav class="navbar navbar-static-top" style="background: white; margin-bottom: 0px">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-events/views', 'id' => $model->eventsID])?>"">
                    <i class="fa fa-calendar"></i> Detail event
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-jadwal-events/index', 'id' => $model->eventsID])?>"">
                    <i class="fa fa-calendar"></i> Jadwal event
                    <span class="label label-success"><?= $jadwal_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-booking/index', 'id' => $model->eventsID])?>">
                        <i class="fa fa-inbox"></i> Stand Booking
                        <span class="label label-success"><?= $booking_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-tiket-events/index', 'id' => $model->eventsID])?>">
                        <i class="fa fa-user"></i> Peserta
                        <span class="label label-success"><?= $tiket_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-presentasi/index', 'id' => $model->eventsID])?>">
                        <i class="fa fa-line-chart"></i> Jadwal Presentasi
                        <span class="label label-success"><?= $jadwal_presentasi_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-stands/index', 'id' => $model->eventsID])?>">
                        <i class="fa fa-inbox"></i> Daftar Stand
                        <span class="label label-success"><?= $stands_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-dokumentasi/index', 'id' => $model->eventsID])?>">
                        <i class="fa fa-camera"></i> Dokumentasi
                        <span class="label label-success"><?= $foto_count?></span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php $this->endBlock()?>

<div class="web-events-view" >

        <div class="col-md-12">

            <?= Html::a('Update', ['update', 'id' => $model->eventsID], ['class' => 'btn btn-primary btn-md']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->eventsID], [
                'class' => 'btn btn-danger btn-md',
                'data' => [
                    'confirm' => 'Apakah Anda Yakin Menghapus Data ini?',
                    'method' => 'post',
                ],
            ]) ?>
            <p></p>
        </div>




<div class="col-md-12" >
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

</div>



