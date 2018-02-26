<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebJurusan */

$this->title = $model->jurusanNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jurusan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->jurusanID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->jurusanID], [
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
//            'jurusanID',
            'jurusanNama',
            [
                'attribute' =>
                    'jurusanUnivID',
                'value' => function ($model) {
                    return \common\models\WebUniv::findOne($model->jurusanUnivID)['univNama'];
                }
            ],
            'jurusanStatus:ntext',
        ],
    ]) ?>

</div>
