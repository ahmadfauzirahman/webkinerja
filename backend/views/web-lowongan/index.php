<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Lowongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-lowongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Lowongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lowonganID',
            'lowonganPerusahaanID',
            'lowonganKategoriLowonganID',
            'lowonganNama:ntext',
            'lowonganFungsiPekerjaan',
            //'lowonganLevelPekerjaan',
            //'lowonganTipePekerjaan',
            //'lowonganStatusPekerjaan:ntext',
            //'lowonganSyaratUmum:ntext',
            //'lowonganJenjangPendidikan:ntext',
            //'lowonganJurusan:ntext',
            //'lowonganIpkMinimal',
            //'lowonganSyaratKhusus:ntext',
            //'lowonganJobDesk:ntext',
            //'lowonganKeterangan:ntext',
            //'lowonganTglPost',
            //'lowonganValid:ntext',
            //'lowonganDaftarOnline:ntext',
            //'lowonganStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
