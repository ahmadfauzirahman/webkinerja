<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasi */

$this->title = 'Tambah Jadwal Presentasi';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Presentasi', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-presentasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->eventsID
    ]) ?>

</div>
