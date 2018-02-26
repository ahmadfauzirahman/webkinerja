<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebKota */

$this->title = $model->kotaNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Kota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->kotaID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->kotaID], [
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
//            'kotaID',
            [
                'attribute' => 'kotaProvinsiID',
                'value' => function ($model) {
                    return \common\models\WebProvinsi::findOne($model->kotaProvinsiID)['provinsiNama'];
                }
            ],
            'kotaNama',
            'kotaStatus:ntext',
        ],
    ]) ?>

</div>
