<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebStands */

$this->title = 'Update Stands: ' . $model->standsID;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Web Stands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->standsID, 'url' => ['view', 'id' => $model->standsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-stands-update">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->EventsID
    ]) ?>

</div>
