<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebSettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-setting-index">

<!--    <h1><?php //= Html::encode($this->title) ?></h1>-->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Web Setting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'settingID',
            'settingSiteTitle',
            'settingSiteDescription:ntext',
            'settingMetaKeyword:ntext',
            'settingCredits',
            //'settingFoto',

            ['class' => 'yii\grid\ActionColumn','visibleButtons' => ['delete' => false]],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
