<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriArtikel\WebKategoriArtikel */

$this->title = $model->kategoriArtikelNama;
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-artikel-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kategoriArtikelID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kategoriArtikelID], [
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
            'kategoriArtikelID',
            'kategoriArtikelNama:ntext',
            'kategoriArtikelStatus:ntext',
        ],
    ]) ?>

</div>
