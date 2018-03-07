<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebPerusahaan */

$this->title = 'Update Web Perusahaan: ' . $model->perusahaanID;
$this->params['breadcrumbs'][] = ['label' => 'Web Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perusahaanID, 'url' => ['view', 'id' => $model->perusahaanID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-perusahaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
