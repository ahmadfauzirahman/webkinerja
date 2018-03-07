<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriStand */

$this->title = 'Update Kategori Stand: ' . $model->kategoriStandID;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Stand', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategoriStandID, 'url' => ['view', 'id' => $model->kategoriStandID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kategori-stand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
