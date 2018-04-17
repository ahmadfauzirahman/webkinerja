<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Lowongan";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-lowongan-index">


    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Buat Lowongan Baru', ['create'], ['class' => 'btn pull-right btn-success', 'title' => 'Buat Lowongan Baru']) ?>
    <h4 class="el-subtitle">Lowongan Anda</h4>
    Anda bisa membuat lowongan pekerjaan yang diterbitkan ke publik
    </p>
    <hr/>
    <?php //Pjax::begin(); ?>
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

            'lowonganID',
            //'lowonganPerusahaanID',
            [
                    'attribute' => 'lowonganKategoriLowonganID',
                    'label' => 'Kategori',
                    'value' => function($model){
                        if($model->lowonganKategoriLowonganID != '') {
                            $kategori = [
                                '1' => 'Lowongan Kerja',
                                '2' => 'Lowongan Magang',
                            ];
                            return $kategori[$model->lowonganKategoriLowonganID];
                        } else {
                            return "-";
                        }
                    },
            ],
            'lowonganNama:ntext',
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
                'value' => function($model){
                    return date('d/m/Y',strtotime($model->lowonganValid));
                },
            ],
            array(
                'label' => 'List Seleksi',
                'format' => 'html',
                'value' => function($model){
                    return Html::a('Lihat Daftar',['/dashboard-seleksi','lowongan' => $model->lowonganID]);
                }
            ),
            'lowonganStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    <?php //Pjax::end(); ?>
</div>
