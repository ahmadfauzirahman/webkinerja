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
            [
                'attribute' => 'eventsThumbnails',
                'headerOptions' => ['style' => 'width:60px'],
                'format' => 'raw',
                'value' => function($model){
        return '<button type="button" class="btn btn-default"
            data-toggle="modal"
            data-target="#foto-' . $model->eventsID . '"><img src="foto_events/' . $model->eventsThumbnails . '" width="30px" height="30px"/></button>
                
                <div class="modal fade " id="foto-' . $model->eventsID. '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title text-center" id="exampleModalLabel">' . $model->eventsJudul . '</h2>
                      </div>
                      <div class="modal-body text-center">
                            <img src="foto_events/' . $model->eventsThumbnails . '" width="800px"/>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                ';
}
            ],
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
