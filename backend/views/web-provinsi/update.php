<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebProvinsi */

$this->title = 'Nama Provinsi : ' . $model->provinsiNama;
$this->params['breadcrumbs'][] = ['label' => 'Nama Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->provinsiNama, 'url' => ['view', 'id' => $model->provinsiNama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-provinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
