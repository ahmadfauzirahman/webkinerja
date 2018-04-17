<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardPerusahaanLamaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "List Pelamar Lowongan";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-pelamar']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view', 'id' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-lamaran-index">

    <p>
        <span class="pull-right">
                <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-perusahaan-pelamar'], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
                <?= Html::a('<i class="fa fa-plus"></i> Tambah Pelamar', ['create', 'lowongan' => $lowongan], ['class' => 'btn btn-success', 'title' => 'Tambah Pelamar']) ?>
        </span>
    <h4 class="el-subtitle"><small>List Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar calon pelamar pekerjaan pada lowongan yang anda publish.
    </p>
    <hr/>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'lamaranID',
            [
                'attribute' => 'lamaranUserID',
                'label' => 'Nama',
                'format' => 'html',
                'value' => function($model){
                    return '<b>'.\common\models\User::findOne($model->lamaranUserID)['nama'].'</b><br><small>ID Lamaran #'.$model->lamaranID.'</small>';
                }
            ],
            //'lamaranUserID',
            //'lamaranLowonganID',
            //'lamaranPermohonan:html',
            'lamaranTglMelamar:datetime',
            //'lamaranKeteranganLamaran:ntext',
            //'lamaranRekomendasi:ntext',
            [
                'attribute' => 'lamaranRekomendasi',
                'value' => function($model){
                    if($model->lamaranRekomendasi == null || $model->lamaranRekomendasi == ''){
                        return '-';
                    } else {
                        return $model->lamaranRekomendasi;
                    }
                }
            ],
            'lamaranStatus:ntext',
//            [
//                'label' => 'Aksi',
//                'format' => 'html',
//                'value' => function($model) use ($lowongan){
//                    if($model->lamaranStatus != 'Ditolak') {
//                        $act = Html::a('<span class="fa fa-close"></span>', ['#', 'id' => $model->lamaranID, 'lowongan' => $lowongan], ['title' => 'Ditolak', 'aria-label' => "Ditolak", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-default btn-circle','data-confirm' => "Anda yakin akan menolak pelamar ini?"]);
//                    }
//                    if($model->lamaranStatus != 'Diterima') {
//                        $act = Html::a('<span class="fa fa-check"></span>', ['#', 'id' => $model->lamaranID, 'lowongan' => $lowongan], ['title' => 'Diterima', 'aria-label' => "Diterima", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-success btn-circle', 'data-confirm' => "Anda yakin akan menerima pelamar ini"]);
//                    }
//                    return $act.' '.Html::a('<span class="fa fa-circle-o"></span>', ['#', 'id' => $model->lamaranID, 'lowongan' => $lowongan], ['title' => 'Pending Review', 'aria-label' => "Pending Review", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-warning btn-circle', 'data-confirm' => "Anda yakin akan menangguhkan pelamar ini"]);
//                },
//            ],

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model) use ($lowongan){
                        if($model->lamaranStatus != 'Ditolak') {
                            $act = Html::a('<span class="fa fa-close"></span>', ['dashboard-perusahaan-lamaran/status', 'id' => $model->lamaranID, 'lowongan' => $lowongan, 'tipe' => 0], ['title' => 'Ditolak', 'aria-label' => "Ditolak", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-default btn-circle','data-confirm' => "Anda yakin akan menolak pelamar ini?"]);
                        }
                        if($model->lamaranStatus != 'Diterima') {
                            $act = Html::a('<span class="fa fa-check"></span>', ['dashboard-perusahaan-lamaran/status', 'id' => $model->lamaranID, 'lowongan' => $lowongan, 'tipe' => 1], ['title' => 'Diterima', 'aria-label' => "Diterima", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-success btn-circle', 'data-confirm' => "Anda yakin akan menerima pelamar ini?"]);
                        }
                        return $act.' '.Html::a('<span class="fa fa-circle-o"></span>', ['dashboard-perusahaan-lamaran/status', 'id' => $model->lamaranID, 'lowongan' => $lowongan, 'tipe' => 2], ['title' => 'Pending Review', 'aria-label' => "Pending Review", 'data-method' => 'post', 'data-pjax' => 0, 'class' => 'btn btn-primary btn-circle', 'data-confirm' => "Anda yakin akan menangguhkan pelamar ini?"]);
                    },
                    'view' => function($url,$model) use ($lowongan){
                        $act1 = Html::a('<span class="fa fa-search"></span>', ['dashboard-perusahaan-lamaran/view','id' => $model->lamaranID,'lowongan' => $lowongan], ['title' => 'View','aria-label' => "View", 'data-pjax' => 0, 'class' => 'btn btn-info btn-circle',]);
                        $act2 = Html::a('<span class="fa fa-pencil"></span>', ['dashboard-perusahaan-lamaran/update','id' => $model->lamaranID,'lowongan' => $lowongan], ['title' => 'Update','aria-label' => "Update", 'data-pjax' => 0, 'class' => 'btn btn-warning btn-circle',]);
                        $act3 = Html::a('<span class="fa fa-trash"></span>', ['dashboard-perusahaan-lamaran/delete','id' => $model->lamaranID,'lowongan' => $lowongan], ['title' => 'Delete','aria-label' => "Delete", 'data-pjax' => 0, 'class' => 'btn btn-danger btn-circle', 'data-method' => 'post', 'data-pjax' => 0, 'data-confirm' => "Anda yakin akan menghapus data lamaran ini?"]);
                        return $act1." ".$act2." ".$act3."<hr/>";
                    },
                    'update' => function($url,$model){
                        return;
                    }
                ],
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
