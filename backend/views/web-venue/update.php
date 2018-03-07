<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebVenue */

$this->title = 'Update Web Venue: ' . $model->venueID;
$this->params['breadcrumbs'][] = ['label' => 'Web Venues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->venueID, 'url' => ['view', 'id' => $model->venueID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-venue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
