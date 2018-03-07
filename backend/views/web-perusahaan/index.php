<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebPerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Perusahaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-perusahaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'perusahaanID',
            'perusahaanUserID',
            'perusahaanNama:ntext',
            'perusahaanJnsIndustriID',
            'perusahaanAlamat:ntext',
            //'perusahaanEmail:email',
            //'perusahaanLink:ntext',
            //'perusahaanTelfon',
            //'perusahaanNegaraID',
            //'perusahaanProvinsiID',
            //'perusahaanKotaID',
            //'perusahaanKodePos',
            //'perusahaanProfil:ntext',
            //'perusahaanNamaOfficer',
            //'perusahaanEmailOfficer:email',
            //'perusahaanTelfonOfficer',
            //'perusahanHpOfficer',
            //'perusahaanStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
