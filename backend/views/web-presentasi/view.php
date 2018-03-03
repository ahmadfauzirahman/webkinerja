<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasi */

$this->title = $model->presentasiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Presentasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-presentasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->presentasiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->presentasiID], [
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
            'presentasiID',
            'presentasiEventsID',
            'presentasiTglMulai',
            'presentasiTglSelesai',
            'presentasiPerusahaanID',
            'webPresentasiStatus',
        ],
    ]) ?>

</div>
