<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebBooking */
$event = \common\models\WebEvents::findOne($model->bookingEventsID);
$this->title = 'Update Web Booking: ' . $model->bookingID;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Booking Stand', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => $model->bookingID, 'url' => ['view', 'id' => $model->bookingID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-booking-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
