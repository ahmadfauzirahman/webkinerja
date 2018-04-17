<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardSeleksi */

$lID = $lowongan;

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Lowongan', 'url' => ['/dashboard-lowongan']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lID, 'url' => ['/dashboard-lowongan/view', 'id'=>$lID]];
$this->params['breadcrumbs'][] = ['label' => 'List Seleksi', 'url' => ['/dashboard-seleksi/index', 'lowongan'=>$lID]];
$this->params['breadcrumbs'][] = ['label' => "#".$model->seleksiID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-seleksi-view">

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-seleksi', 'lowongan' => $lID], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'lowongan' => $lID,'id' => $model->seleksiID], ['class' => 'btn btn-success', 'title' => 'Update']) ?>
        </span>
        <h4 class="el-subtitle">List Seleksi ( <b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?></b> )</h4>
    Anda bisa membuat daftar seleksi untuk lowongan pekerjaan <?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?>.
    </p>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'seleksiID',
            //'seleksiLowonganID',
//            'seleksiKategoriSeleksiID',
            [
              'attribute' => 'seleksiKategoriSeleksiID',
              'value' => function($model){
                 return \common\models\WebKategoriSeleksi::find()->where(['kategoriSeleksiID' => $model->seleksiKategoriSeleksiID])->one()['kategoriSeleksiNama'];
              }
            ],
            'seleksiNama:ntext',
            'seleksiTglAwal',
            'seleksiTglAkhir',
            [
                'attribute' => 'seleksiLokasi',
                'value' => function($model){
                    if($model->seleksiLokasi == 0){
                        return "UIN SUSKA RIAU";
                    } else {
                        return "Lainnya";
                    }
                }
            ],
            'seleksiTempat:ntext',
            'seleksiRuangan:ntext',
            'seleksiKeterangan:ntext',
            'seleksiStatus:ntext',
        ],
    ]) ?>

</div>
