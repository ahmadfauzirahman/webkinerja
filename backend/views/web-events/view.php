<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = $model->eventsJudul;
$this->params['breadcrumbs'][] = ['label' => 'Web Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->eventsID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->eventsID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eventsID',
            'eventsJudul:ntext',
            'eventsTanggalMulai',
            'eventsTanggalSelesai',
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
