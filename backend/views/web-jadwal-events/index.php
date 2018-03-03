<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebJadwalEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jadwal-events-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>Tambah Jadwal Events', ['create', 'id'=>$event->eventsID], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'jadwalEventsID',
            'jadwalEventsTglMulai:datetime',
            'jadwalEventsTglSelesai:datetime',
            'jadwalEventsNama',
//            'jadwalEventsEventsID',

            [
                'attribute' => 'jadwalEventsEventsID',
                'value' => function($model){
                    return \common\models\WebEvents::findOne($model->jadwalEventsEventsID)['eventsJudul'];
                }
            ],

            //'jadwalEventsStatus:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                        'update' => function($url,$model, $key){
                            $title = Yii::t('yii', 'Update');
                            $options = [
                                    'title' => $title,
                                    'aria-label' => $title,
                                    'data-pjax' => '0'
                            ];
                            $url = \yii\helpers\Url::to(["web-jadwal-events/update","id"=>$model->jadwalEventsID,"id2"=>$model->jadwalEventsEventsID]);
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, $options);
                        }
                        ],
                ]]
    ]); ?>
    <?php Pjax::end(); ?>
</div>
