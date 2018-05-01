<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebSeleksi */

$this->title = $model->seleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-seleksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->seleksiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->seleksiID], [
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
            'seleksiID',
            'seleksiLowonganID',
            'seleksiKategoriSeleksiID',
            'seleksiNama:ntext',
            'seleksiTglAwal',
            'seleksiTglAkhir',
            'seleksiTempat:ntext',
            'seleksiRuangan:ntext',
            'seleksiKeterangan:ntext',
            'seleksiStatus:ntext',
        ],
    ]) ?>

</div>
