<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = 'Update Web Events: ' . $model->eventsID;
$this->params['breadcrumbs'][] = ['label' => 'Web Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventsID, 'url' => ['view', 'id' => $model->eventsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-events-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
