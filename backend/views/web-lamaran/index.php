<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebLamaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Lamarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-lamaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Lamaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lamaranID',
            'lamaranUserID',
            'lamaranLowonganID',
            'lamaranPermohonan:ntext',
            'lamaranTglMelamar',
            //'lamaranKeteranganLamaran:ntext',
            //'lamaranStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
