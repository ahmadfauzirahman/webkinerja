<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasi */

$this->title = 'Update Jadwal Presentasi: ' . $model->presentasiID;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Presentasi', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => $model->presentasiID, 'url' => ['view', 'id' => $model->presentasiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-presentasi-update">



    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->eventsID
    ]) ?>

</div>
