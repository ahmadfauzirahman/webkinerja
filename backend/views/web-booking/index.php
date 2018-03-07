<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebBookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Booking Stand';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-booking-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'bookingID',
//            'bookingEventsID',
//            'bookingStandsID',
            [
              'attribute' => 'bookingStandsID',
              'value' => function($model){
                    return \common\models\WebStands::findOne($model->bookingStandsID)['standsNama'];
              }
            ],
            'bookingPerusahaanEmail:email',
            'bookingPerusahaanNama',
            //'bookingJnsIndustriID',
            //'bookingPerusahaanTelfon',
            //'bookingPerusahaanNamaOfficer',
            //'bookingPerusahaanJbtnOfficer',
            //'bookingPerusahaanTelfonOfficer',
            //'bookingCatatan:ntext',
            //'bookingBuktiPembayaran:ntext',
            'bookingStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
