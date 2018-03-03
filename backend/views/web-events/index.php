<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'eventsID',
            'eventsJudul:ntext',
            'eventsTanggalMulai:date',
            'eventsTanggalSelesai:date',
            'eventsLokasi:ntext',
//            'eventsKeterangan:ntext',
            //'eventsThumbnails:ntext',
//            'eventsStatus',
            [
              'attribute' => 'eventsStatus',
              'contentOptions' => ['style'=>'width:80px'],
              'format' => 'raw',
              'value' => function($model){
                    if ($model->eventsStatus == "aktif"){
                        return "<label class='label label-primary'>$model->eventsStatus</label>";
                    }else{
                        return "<label class='label label-danger'>$model->eventsStatus</label>";
                    }
              }
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
