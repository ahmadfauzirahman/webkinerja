<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebTiketEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Tiket Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-tiket-events-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'tiketEventsID',
//            'tiketEventsEventsID',
//            'tiketEventsUserID',
            [
                'attribute' => 'tiketEventsUserID',
                'value' => function($model){
                    return \common\models\User::findOne($model->tiketEventsUserID)['nama'];
                }
            ],
            [
                'attribute' => 'Email',
                'value' => function($model){
                    return \common\models\User::findOne($model->tiketEventsUserID)['email'];
                }
            ],
            'tiketEventsStatus:ntext',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
