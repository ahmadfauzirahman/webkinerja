<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriArtikel\WebKategoriArtikel */

$this->title = 'Update Web Kategori Artikel: ' . $model->kategoriArtikelNama;
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategoriArtikelID, 'url' => ['view', 'id' => $model->kategoriArtikelID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kategori-artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
