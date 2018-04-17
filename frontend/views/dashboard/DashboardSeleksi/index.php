<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardSeleksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$lID = $lowongan;

$this->title = "List Seleksi";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Lowongan', 'url' => ['/dashboard-lowongan']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lID, 'url' => ['/dashboard-lowongan/view', 'id'=>$lID]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-seleksi-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-lowongan'], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Seleksi Baru', ['create', 'lowongan' => $lID], ['class' => 'btn btn-success', 'title' => 'Tambah Seleksi Baru']) ?>
        </span>
    <h4 class="el-subtitle">List Seleksi ( <b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?></b> )</h4>
    Anda bisa membuat daftar seleksi untuk lowongan pekerjaan <?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?>.
    </p>
    <hr/>
    <?php Pjax::begin(); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'seleksiID',
            //'seleksiLowonganID',
            'seleksiKategoriSeleksiID',
            'seleksiNama:ntext',
            'seleksiTglAwal',
            'seleksiTglAkhir',
            'seleksiTempat:ntext',
            'seleksiRuangan:ntext',
            //'seleksiKeterangan:ntext',
            'seleksiStatus:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model) use ($lID){
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->seleksiID, 'lowongan' => $lID], ['title' => 'Delete','data-method' => 'post','aria-label' => "Delete", 'data-pjax' => 0,'data-confirm' => "Are you sure you want to delete this item?"]);
                        },
                    'view' => function($url,$model) use ($lID){
                        return Html::a('<span class="glyphicon glyphicon-search"></span>', ['view', 'id' => $model->seleksiID, 'lowongan' => $lID], ['title' => 'View','aria-label' => "View", 'data-pjax' => 0]);
                    },
                    'update' => function($url,$model) use ($lID){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->seleksiID, 'lowongan' => $lID], ['title' => 'Update','aria-label' => "Update", 'data-pjax' => 0]);
                    }
                ],
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
