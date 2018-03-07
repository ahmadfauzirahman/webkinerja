<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebJnsIndustri */

$this->title = $model->jnsIndustriID;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Industri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jns-industri-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jnsIndustriID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jnsIndustriID], [
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
            'jnsIndustriID',
            'jnsIndustriNama',
            'jnsIndustriStatus',
        ],
    ]) ?>

</div>
