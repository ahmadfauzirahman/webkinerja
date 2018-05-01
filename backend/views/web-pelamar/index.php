<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WebPelamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Pelamars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-pelamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Pelamar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pelamarID',
            'pelamarUserID',
            'pelamarNama',
            'pelamarJK',
            'pelamarTmptLahir',
            //'pelamarTglLahir',
            //'pelamarKewarganegaraan',
            //'pelamarTinggiBadan',
            //'pelamarBeratBadan',
            //'pelamarGolDarah',
            //'pelamarAgama',
            //'pelamarAlamat:ntext',
            //'pelamarTelfon',
            //'pelamarEmail:email',
            //'pelamarPendididkanFormal:ntext',
            //'pelamarPendidikanNonFormal:ntext',
            //'pelamarKemampuan:ntext',
            //'pelamarPengalamanAkademik:ntext',
            //'pelamarPengalamanKerja:ntext',
            //'pelamarFoto:ntext',
            //'pelamarNamaAyah',
            //'pelamarPekerjaanAyah',
            //'pelamarNamaIbu',
            //'pelamarPekerjaanIbu',
            //'pelamarStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
