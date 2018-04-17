<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriSeleksi */

$this->title = 'Update Web Kategori Seleksi: ' . $model->kategoriSeleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Seleksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategoriSeleksiID, 'url' => ['view', 'id' => $model->kategoriSeleksiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kategori-seleksi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
