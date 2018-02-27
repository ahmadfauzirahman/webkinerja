<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriArtikel\WebKategoriArtikel */

$this->title = 'Create Web Kategori Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
