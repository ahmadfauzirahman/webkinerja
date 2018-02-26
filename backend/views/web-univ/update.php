<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */

$this->title = 'Update Web Univ: ' . $model->univID;
$this->params['breadcrumbs'][] = ['label' => 'Web Univs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->univID, 'url' => ['view', 'id' => $model->univID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-univ-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
