<?php

use frontend\models\Dashboard\DashboardPerusahaanLamaranSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanLamaran */

$this->title = "#".$model->lamaranID;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-pelamar']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view', 'id' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => 'List Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-lamaran', 'lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-lamaran-view">

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-perusahaan-lamaran', 'lowongan' => $lowongan], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'lowongan' => $lowongan,'id' => $model->lamaranID], ['class' => 'btn btn-success', 'title' => 'Update']) ?>
        </span>
    <h4 class="el-subtitle"><small>List Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar calon pelamar pekerjaan pada lowongan yang anda publish.
    </p>
    <hr/>

    <h3 class="el-subtitle">Detail Lamaran</h3>
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-hover'
        ],
        'attributes' => [
            'lamaranID',
//            'lamaranUserID',
            [
                'attribute' => 'lamaranUserID',
                'label' => 'Nama',
                'format' => 'html',
                'value' => function($model){
                    return '<b>'.\common\models\User::findOne($model->lamaranUserID)['nama'].'</b>';
                }
            ],
            //'lamaranLowonganID',
            'lamaranTglMelamar:datetime',
            'lamaranPermohonan:html',
            'lamaranKeteranganLamaran:html',
            'lamaranRekomendasi:ntext',
            'lamaranStatus:ntext',
        ],
    ]) ?>

    <h3 class="el-subtitle">Detail CV</h3>

    <?php $models = \frontend\models\User\DashboardPelamar::find()->where(['pelamarUserID' => $model->lamaranUserID])->one();
        if($models != null){
            $user = \frontend\models\User\User::findOne($model->lamaranUserID);
    ?>
    <?= DetailView::widget([
        'model' => \frontend\models\User\DashboardPelamar::find()->where(['pelamarUserID' => $model->lamaranUserID])->one(),
                'options' => [
                    'class' => 'table table-hover'
                ],
        'attributes' => [
//            'pelamarID',
            'pelamarUserID',
            //'pelamarFoto',
            [
                'attribute' => 'pelamarFoto',
                'format' => 'raw',
                'value' => '<img class="avatar" style="border:1px solid #dddddd; float: left; width: 80px; height: 80px;" src="'.Yii::$app->request->baseUrl .'/../../backend/web/foto/'. $user['foto'].'" alt="avatar">',
            ],
            'pelamarNama',
            'pelamarJK',
            'pelamarTmptLahir',
            //'pelamarTglLahir',
            [
                'attribute' => 'pelamarTglLahir',
                'value' => function($model){
                    return date('d F Y',strtotime($model->pelamarTglLahir));
                }
            ],
            'pelamarKewarganegaraan',
            //'pelamarTinggiBadan',
            [
                'attribute' => 'pelamarTinggiBadan',
                'value' => function($model){
                    return $model->pelamarTinggiBadan." cm";
                }
            ],
            //'pelamarBeratBadan',
            [
                'attribute' => 'pelamarTinggiBadan',
                'value' => function($model){
                    return $model->pelamarBeratBadan." kg";
                }
            ],
            'pelamarGolDarah',
            'pelamarAgama',
            'pelamarAlamat',
            'pelamarTelfon',
            'pelamarEmail',
//            'pelamarPendididkanFormal',
            [
                'attribute' => 'pelamarPendididkanFormal',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->pelamarPendididkanFormal);
                    foreach($data AS $d){
                        $s .= '<li>'.$d.'</li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            //'pelamarPendidikanNonFormal',
            [
                'attribute' => 'pelamarPendidikanNonFormal',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->pelamarPendidikanNonFormal);
                    foreach($data AS $d){
                        $s .= '<li>'.$d.'</li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            //'pelamarKemampuan',
            [
                'attribute' => 'pelamarKemampuan',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->pelamarKemampuan);
                    foreach($data AS $d){
                        $s .= '<li>'.$d.'</li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            //'pelamarPengalamanAkademik',
            [
                'attribute' => 'pelamarPengalamanAkademik',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->pelamarPengalamanAkademik);
                    foreach($data AS $d){
                        $s .= '<li>'.$d.'</li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            //'pelamarPengalamanKerja',
            [
                'attribute' => 'pelamarPengalamanKerja',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->pelamarPengalamanKerja);
                    foreach($data AS $d){
                        $s .= '<li>'.$d.'</li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            'pelamarNamaAyah',
            'pelamarNamaIbu',
            'pelamarPekerjaanIbu',
            'pelamarPekerjaanAyah',
            //'pelamarStatus',
        ],
    ]) ?>
    <?php } else { echo "Data CV tidak ditemukan<br><br>"; } ?>

    <h3 class="el-subtitle">Berkas Pelamar</h3>

    <?php
        $q = \frontend\models\User\DashboardBerkasPelamar::find()->where(['berkasPelamarUserID' => $model->lamaranUserID, 'berkasPelamarStatus' => 1])->all();
        if(count($q) != 0){
        $dB = new ActiveDataProvider([
            'query' => \frontend\models\User\DashboardBerkasPelamar::find()->where(['berkasPelamarUserID' => $model->lamaranUserID, 'berkasPelamarStatus' => 1]),
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dB,
        // \frontend\models\User\DashboardBerkasPelamar::find()->where(['berkasPelamarUserID' => $model->lamaranUserID])->all(),
        //'filterModel' => $searchModel,
                'tableOptions' => [
                    'class' => 'table table-hover'
                ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'berkasPelamarID',
//            'berkasPelamarUserID',
            'berkasPelamarNama:ntext',
//            'berkasPelamarFile:ntext',
//            [
//                'attribute' => 'berkasPelamarFile',
//                'format' => 'html',
//                'value' => function($model) {
//                    return Html::a($model->berkasPelamarFile,'../web/berkaspelamar/' . $model->berkasPelamarUserID . '/' . $model->berkasPelamarFile,['target' => '_blank']);
//                }
//            ],
//            [
//                'attribute' => 'berkasPelamarStatus',
//                'value' => function($model){
//                    if($model->berkasPelamarStatus == "1"){
//                        return "Publik";
//                    } elseif($model->berkasPelamarStatus == "0"){
//                        return "Private";
//                    } else {
//                        return "Undefine";
//                    }
//                },
//            ],
//            'berkasPelamarStatus:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model) use ($lowongan){
                        return;
                    },
                    'view' => function($url,$model) use ($lowongan){
                        $act1 = Html::a('<span class="fa fa-download"></span> Download', '../web/berkaspelamar/' . $model->berkasPelamarUserID . '/' . $model->berkasPelamarFile, ['title' => 'Download','aria-label' => "Download", 'data-pjax' => 0, 'target' => '_blank']);
                        return $act1;
                    },
                    'update' => function($url,$model){
                        return;
                    }
                ],
            ],
        ],
    ]); ?>
<?php } else { echo "Data berkas tidak ditemukan";} ?>

</div>
