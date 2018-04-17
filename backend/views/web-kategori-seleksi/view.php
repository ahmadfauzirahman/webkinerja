<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriSeleksi */

$this->title = $model->kategoriSeleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Seleksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-seleksi-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kategoriSeleksiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kategoriSeleksiID], [
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
            'kategoriSeleksiID',
            'kategoriSeleksiNama:ntext',
            'kategoriSeleksiStatus:ntext',
        ],
    ]) ?>

</div>
