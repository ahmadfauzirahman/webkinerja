<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\User\DashboardPengajuanLamaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Pengajuan Lamaran Kerja";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-pengajuan-lamaran-index">

    <?php Pjax::begin(); ?>

    <h4 class="el-subtitle">Pengajuan Lamaran Kerja</h4>
    Data dari lamaran kerja yang telah anda ajukan.
    </p>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                'attribute' => 'lamaranID',
                'label' => 'ID Lamaran'
            ],
            //'lamaranUserID',
            //'lamaranLowonganID',
            [
                'attribute' => 'lamaranLowonganID',
                'format' => 'html',
                'value' => function($model){
                    $lowongan = \frontend\models\Dashboard\DashboardLowongan::findOne($model->lamaranLowonganID);
                    $perusahaan = \common\models\WebPerusahaan\WebPerusahaan::findOne($lowongan['lowonganPerusahaanID']);
                    return $lowongan['lowonganNama']."<br><small>".$perusahaan['perusahaanNama']."</small>";

                },
            ],
            //'lamaranPermohonan:ntext',
            'lamaranTglMelamar:date',
            //'lamaranKeteranganLamaran:ntext',
            'lamaranStatus:ntext',

            ['class' => 'yii\grid\ActionColumn','visibleButtons' =>
                [
                    'delete' =>  function($model){
                        if($model->lamaranStatus == 'Pending Review'){
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'update' => false,
                    'view' => true,
                ]],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
