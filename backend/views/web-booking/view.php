<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebBooking */
$event = \common\models\WebEvents::findOne($model->bookingEventsID);
$this->title = $model->bookingID;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Booking', 'url' => ['index','id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-booking-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bookingID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bookingID], [
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
            'bookingID',
//            'bookingEventsID',
            [
                    'attribute' => 'bookingEventsID',
                    'value' => function($model){
                        return \common\models\WebEvents::findOne($model->bookingEventsID)['eventsJudul'];
                    }
            ],
//            'bookingStandsID',
            [
                'attribute' => 'bookingStandsID',
                'value' => function($model){
                    return \common\models\WebStands::findOne($model->bookingStandsID)['standsNama'];
                }
            ],
            'bookingPerusahaanEmail:email',
            'bookingPerusahaanNama',
            'bookingJnsIndustriID',
            'bookingPerusahaanTelfon',
            'bookingPerusahaanNamaOfficer',
            'bookingPerusahaanJbtnOfficer',
            'bookingPerusahaanTelfonOfficer',
            'bookingCatatan:ntext',
            'bookingBuktiPembayaran:ntext',
            'bookingStatus:ntext',
        ],
    ]) ?>

</div>
