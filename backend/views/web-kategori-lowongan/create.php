<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriLowongan */

$this->title = 'Create Web Kategori Lowongan';
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-lowongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
