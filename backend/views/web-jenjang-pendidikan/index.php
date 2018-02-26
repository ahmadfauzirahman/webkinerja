<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebJenjangPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Jenjang Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jenjang-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Jenjang Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jenjangPendidikanID',
            'jenjangPendidikanNama:ntext',
            'jenjangPendidikanStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
