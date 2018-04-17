<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebKategoriSeleksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Kategori Seleksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-seleksi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Kategori Seleksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kategoriSeleksiID',
            'kategoriSeleksiNama:ntext',
            'kategoriSeleksiStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
