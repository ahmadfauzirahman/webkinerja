<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "List Hasil Seleksi";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Hasil Seleksi Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-hasil-seleksi']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view','id' => $lowongan]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-hasil-seleksi-lowongan-index">

    <p>
        <span class="pull-right">
                <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-perusahaan-hasil-seleksi'], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
                <?= Html::a('<i class="fa fa-plus"></i> Tambah Hasil Seleksi', ['create', 'lowongan' => $lowongan], ['class' => 'btn btn-success', 'title' => 'Tambah Hasil Seleksi']) ?>
        </span>
    <h4 class="el-subtitle">    <small>Hasil Seleksi Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar hasil seleksi calon pelamar pekerjaan pada lowongan yang anda publish.
    <hr/>
    <small>Telah dinilai </small><b style="font-size: 20px"><?= $dataProvider->getCount() ?></b></small> dari
    </small><b style="font-size: 20px"><?=
    count(\common\models\WebLamaran\WebLamaran::find()->where(['lamaranLowonganID' => $lowongan,'lamaranStatus' => 'Diterima'])->all());

    //count(\common\models\WebLamaran\WebLamaran::find()->where(['lamaranLowonganID' => $lowongan,'lamaranStatus' => 'Diterima'])->andWhere('NOT EXISTS (SELECT * FROM web_hasil_seleksi WHERE web_hasil_seleksi.hasilSeleksiLamaranID = web_lamaran.lamaranID)')->all());
        ?></b>
    <small> Pelamar Lowongan</small>
    </p>
    <hr/>
    <?php Pjax::begin(); ?>

    <?php echo $this->render('_search', ['model' => $searchModel, 'lowongan' => $lowongan]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hasilSeleksiID',
            //'hasilSeleksiLamaranID',
            //'hasilSeleksiUserID',
            [
                'attribute' => 'hasilSeleksiUserID',
                'label' => 'Nama',
                'format' => 'html',
                'value' => function($model){
                    return '<b>'.\frontend\models\User\DashboardPelamar::find()->where(['pelamarUserID' => $model->hasilSeleksiUserID])->one()['pelamarNama'].'</b><br><small>#'. $model->hasilSeleksiUserID .'</small>';
                }
            ],
            //'hasilSeleksiHasil:ntext',
            'hasilSeleksiKeterangan:ntext',
            'hasilSeleksiStatus:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model) use ($lowongan){
                        return;
                    },
                    'view' => function($url,$model) use ($lowongan){
                        $act1 = Html::a('<span class="fa fa-search"></span>', ['dashboard-perusahaan-hasil-seleksi-lowongan/view','id' => $model->hasilSeleksiID,'lowongan' => $lowongan], ['title' => 'View','aria-label' => "View", 'data-pjax' => 0,]);
                        $act2 = Html::a('<span class="fa fa-pencil"></span>', ['dashboard-perusahaan-hasil-seleksi-lowongan/update','id' => $model->hasilSeleksiID,'lowongan' => $lowongan], ['title' => 'Update','aria-label' => "Update", 'data-pjax' => 0,]);
                        $act3 = Html::a('<span class="fa fa-trash"></span>', ['dashboard-perusahaan-hasil-seleksi-lowongan/delete','id' => $model->hasilSeleksiID,'lowongan' => $lowongan], ['title' => 'Delete','aria-label' => "Delete", 'data-pjax' => 0, 'data-method' => 'post', 'data-pjax' => 0, 'data-confirm' => "Anda yakin akan menghapus data hasil seleksi ini?"]);
                        $act4 = Html::a('<span class="fa fa-file-text"></span>', ['dashboard-perusahaan-lamaran/view','id' => $model->hasilSeleksiLamaranID,'lowongan' => $lowongan], ['title' => 'Detail Lamaran','aria-label' => "Detail Lamaran", 'data-pjax' => 0, 'target' => '_blank']);
                        return $act4." | ".$act1." ".$act2." ".$act3;
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
