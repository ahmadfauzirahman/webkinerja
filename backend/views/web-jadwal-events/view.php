<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEvents */

$this->title = $model->jadwalEventsNama;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $model->jadwalEventsEventsID, 'url' => ['web-events/view', 'id'=> $model->jadwalEventsEventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Events', 'url' => ['index', 'id'=> $model->jadwalEventsEventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jadwal-events-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jadwalEventsID, 'id2'=>$model->jadwalEventsEventsID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->jadwalEventsID], [
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
            'jadwalEventsID',
            'jadwalEventsEventsID',
            'jadwalEventsTglMulai',
            'jadwalEventsTglSelesai',
            'jadwalEventsNama',
            'jadwalEventsStatus:ntext',
        ],
    ]) ?>

</div>
