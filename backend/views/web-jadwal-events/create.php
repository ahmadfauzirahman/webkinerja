<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEvents */

$this->title = 'Tambah Jadwal Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Events', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jadwal-events-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->eventsID
    ]) ?>

</div>
