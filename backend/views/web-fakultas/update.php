<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebFakultas */

$this->title = 'Update Web Fakultas: ' . $model->fakultasID;
$this->params['breadcrumbs'][] = ['label' => 'Web Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fakultasID, 'url' => ['view', 'id' => $model->fakultasID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-fakultas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
