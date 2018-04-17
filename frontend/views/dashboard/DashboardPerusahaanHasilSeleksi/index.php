<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Hasil Seleksi Pelamar Lowongan";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-lowongan-index">


    <p>

    <h4 class="el-subtitle">Hasil Seleksi Pelamar Lowongan Anda</h4>
    Daftar hasil seleksi calon pelamar pekerjaan pada lowongan yang anda publish.
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

            //'lowonganPerusahaanID',
            [
                    'attribute' => 'lowonganNama',
                    'format' => 'html',
                    'value' => function($model){
                        if($model->lowonganKategoriLowonganID != '') {
                            $kategori = [
                                '1' => 'Lowongan Kerja',
                                '2' => 'Lowongan Magang',
                            ];
                            return '<b>'.$model->lowonganNama.'</b><br><small>'.$kategori[$model->lowonganKategoriLowonganID].'<br>#'.$model->lowonganID.'</small>';
                        } else {
                            return '<b>'.$model->lowonganNama.'</b><br><small>-<br>#'.$model->lowonganID.'</small>';
                        }
                    },
            ],
            //'lowonganNama:ntext',
            //'lowonganFungsiPekerjaan',
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
            [
                'attribute' => 'lowonganValid',
                'format' => 'html',
                'value' => function($model){
                    if($model->lowonganValid >= date('Y-m-d')){
                        $status = '<i style="color: #ffff00">Pendaftaran Masih Dibuka</i>';
                    } else {
                        $status = 'Pendaftaran Telah Ditutup';
                    }
                    return date('d F Y',strtotime($model->lowonganValid)).'<br><span class="badge">'.$status.'</span>';
                },
            ],
//            array(
//                'label' => 'List Seleksi',
//                'format' => 'html',
//                'value' => function($model){
//                    return Html::a('Lihat Daftar',['/dashboard-seleksi','lowongan' => $model->lowonganID]);
//                }
//            ),
            [
                'attribute' => 'lowonganStatus',
                'label' => 'Status'
            ],
            [
                'label' => 'Total Pelamar',
                'value' => function($model){
                    return count(\common\models\WebLamaran\WebLamaran::find()->where(['lamaranLowonganID' => $model->lowonganID,'lamaranStatus' => 'Diterima'])->all())." Orang";
                }
            ],
                //'lowonganStatus:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model){
                        return;
                    },
                    'view' => function($url,$model){
                        return Html::a('<span class="fa fa-users"></span>', ['/dashboard-perusahaan-hasil-seleksi-lowongan','lowongan' => $model->lowonganID], ['title' => 'List Pelamar','aria-label' => "List Pelamar", 'data-pjax' => 0]);
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
