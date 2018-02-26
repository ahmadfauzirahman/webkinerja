<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKota */

$this->title = 'Nama Kota: ' . $model->kotaNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Kota', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kotaNama, 'url' => ['view', 'id' => $model->kotaNama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
