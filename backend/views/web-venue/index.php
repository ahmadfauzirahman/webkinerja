<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebVenueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Venues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-venue-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Venue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'venueID',
            'venueNama',
//            'venueStatus',
            [
                'attribute' => 'venueStatus',
                'format' => 'raw',
                'value' => function($model){
                    if ($model->venueStatus == "Aktif"){
                        return "<label class='label label-primary'>".$model->venueStatus."</label>";
                    }else{
                        return "<label class='label label-danger'>".$model->venueStatus."</label>";
                    }
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
