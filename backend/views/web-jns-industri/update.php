<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebJnsIndustri */

$this->title = 'Update Jenis Industri: ' . $model->jnsIndustriID;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Industri', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jnsIndustriID, 'url' => ['view', 'id' => $model->jnsIndustriID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-jns-industri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
