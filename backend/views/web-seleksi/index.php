<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebSeleksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Seleksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-seleksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Seleksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'seleksiID',
            'seleksiLowonganID',
            'seleksiKategoriSeleksiID',
            'seleksiNama:ntext',
            'seleksiTglAwal',
            //'seleksiTglAkhir',
            //'seleksiTempat:ntext',
            //'seleksiRuangan:ntext',
            //'seleksiKeterangan:ntext',
            //'seleksiStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
