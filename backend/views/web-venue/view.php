<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebVenue */

$this->title = $model->venueNama;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Venue', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-venue-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->venueID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->venueID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'venueID',
            'venueNama',
            'venueStatus',
        ],
    ]) ?>

</div>
