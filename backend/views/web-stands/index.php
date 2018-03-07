<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebStandsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Stands';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-stands-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Stand', ['create', 'id'=>$event->eventsID], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'standsID',
//            'standsVenueID',
            [
                'attribute' => 'standsVenueID',
                'value' => function($model){
                    return \common\models\WebVenue::findOne($model->standsVenueID)['venueNama'];
                }
            ],
//            'standsEventsID',
            'standsNama',
//            'standsKategoriStandID',
            [
                'attribute' => 'standsKategoriStandID',
                'value' => function($model){
                    return \common\models\WebKategoriStand::findOne($model->standsKategoriStandID)['kategoriStandNama'];
                }
            ],
            'standsPerusahaanID',
//            'standsStatus:ntext',
            [
                'attribute' => 'standsStatus',
                'format' => 'raw',
                'value' => function($model){
                    if ($model->standsStatus == 'kosong'){
                        return "<label class='label label-primary'>".$model->standsStatus."</label>";
                    }else{
                        return "<label class='label label-danger'>".$model->standsStatus."</label>";
                    }
                }
            ],

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
                        $url = \yii\helpers\Url::to(["web-stands/update","id"=>$model->standsID,"id2"=>$model->standsEventsID]);
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, $options);
                    },
                    'view' => function($url,$model, $key){
                        $title = Yii::t('yii', 'View');
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0'
                        ];
                        $url = \yii\helpers\Url::to(["web-stands/view","id"=>$model->standsID,"id2"=>$model->standsEventsID]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
