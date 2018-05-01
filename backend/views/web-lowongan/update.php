<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebLowongan */

$this->title = 'Update Web Lowongan: ' . $model->lowonganID;
$this->params['breadcrumbs'][] = ['label' => 'Web Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lowonganID, 'url' => ['view', 'id' => $model->lowonganID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-lowongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
