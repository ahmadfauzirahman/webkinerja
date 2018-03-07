<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebDokumentasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dokumentasi Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-dokumentasi-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Dokumentasi', ['create', 'id'=>$event->eventsID], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'dokumentasiID',
            [
                'attribute' => '',
                'headerOptions' => ['style' => 'width:60px'],
                'format' => 'raw',
                'value' => function($model){
                    return '<button type="button" class="btn btn-default"
            data-toggle="modal"
            data-target="#foto-' . $model->dokumentasiEventsID . '"><img src="foto_events/' . $model->DokumentasiFoto . '" width="30px" height="30px"/></button>
                
                <div class="modal fade " id="foto-' . $model->dokumentasiEventsID. '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                      </div>
                      <div class="modal-body text-center">
                            <img src="foto_events/' . $model->DokumentasiFoto . '" width="800px"/>
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
            [
              'attribute' => 'dokumentasiEventsID',
              'value' => function($model){
                    return \common\models\WebEvents::findOne($model->dokumentasiEventsID)['eventsJudul'];
              }
            ],
            'DokumentasiFoto:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
