<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriStand */

$this->title = $model->kategoriStandID;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Stand', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-stand-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kategoriStandID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kategoriStandID], [
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
            'kategoriStandID',
            'kategoriStandNama',
            'kategoriStandFasilitas:ntext',
            'kategoriStandHarga',
            'kategoriStandStatus',
        ],
    ]) ?>

</div>
