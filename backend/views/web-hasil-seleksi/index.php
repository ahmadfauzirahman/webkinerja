<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebHasilSeleksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Hasil Seleksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-hasil-seleksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Hasil Seleksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hasilSeleksiID',
            'hasilSeleksiSeleksiID',
            'hasilSeleksiUserID',
            'hasilSeleksiLamaranID',
            'hasilSeleksiHasil:ntext',
            //'hasilSeleksiKeterangan:ntext',
            //'hasilSeleksiStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
