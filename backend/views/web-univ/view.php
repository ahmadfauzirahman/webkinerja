<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */

$this->title = $model->univNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-univ-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->univID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->univID], [
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
//            'univID',
            'univNama',
            'univStatus:ntext',
        ],
    ]) ?>

</div>
