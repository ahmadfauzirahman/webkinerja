<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = $model->eventsID;
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
            'eventsThumbnails:ntext',
            'eventsStatus',
        ],
    ]) ?>

</div>
