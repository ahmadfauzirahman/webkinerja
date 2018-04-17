<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriSeleksi */

$this->title = 'Create Web Kategori Seleksi';
$this->params['breadcrumbs'][] = ['label' => 'Web Kategori Seleksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-seleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
