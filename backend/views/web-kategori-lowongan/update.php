<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriLowongan */

$this->title = 'Update Web Kategori Lowongan: ' . $model->kategoriLowonganID;
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategoriLowonganID, 'url' => ['view', 'id' => $model->kategoriLowonganID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kategori-lowongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
