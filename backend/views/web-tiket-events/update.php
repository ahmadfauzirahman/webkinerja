<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebTiketEvents */

$this->title = 'Update Web Tiket Events: ' . $model->tiketEventsID;
$this->params['breadcrumbs'][] = ['label' => 'Web Tiket Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tiketEventsID, 'url' => ['view', 'id' => $model->tiketEventsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-tiket-events-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
