<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventsID',
            'eventsJudul:ntext',
            'eventsTanggalMulai',
            'eventsTanggalSelesai',
            'eventsLokasi:ntext',
            //'eventsKeterangan:ntext',
            //'eventsThumbnails:ntext',
            //'eventsStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
