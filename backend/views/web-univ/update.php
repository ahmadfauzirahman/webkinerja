<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */

$this->title = 'Nama Universitas: ' . $model->univNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->univNama, 'url' => ['view', 'id' => $model->univNama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-univ-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
