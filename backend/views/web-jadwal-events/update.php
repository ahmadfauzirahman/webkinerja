<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEvents */

$this->title = 'Update Web Jadwal Events: ' . $model->jadwalEventsID;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'jadwal Events', 'url' => ['web-jadwal-events/index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => $model->jadwalEventsNama, 'url' => ['view', 'id' => $model->jadwalEventsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-jadwal-events-update">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->eventsID
    ]) ?>

</div>
