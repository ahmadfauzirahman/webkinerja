<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebPresentasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Presentasi';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-presentasi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Jadwal Presentasi', ['create', 'id'=>$event->eventsID], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'presentasiID',
            'presentasiPerusahaanID',
//            'presentasiEventsID',
            'presentasiTglMulai',
            'presentasiTglSelesai',
//            'presentasiPerusahaanID',
            'webPresentasiStatus',

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
                        $url = \yii\helpers\Url::to(["web-presentasi/update","id"=>$model->presentasiID,"id2"=>$model->presentasiEventsID]);
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, $options);
                    }
                ],
            ]]
    ]); ?>
    <?php Pjax::end(); ?>
</div>
