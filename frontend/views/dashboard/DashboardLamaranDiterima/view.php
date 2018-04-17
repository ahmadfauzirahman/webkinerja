<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardPengajuanLamaran */

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Lamaran Kerja Diterima', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->lamaranID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-pengajuan-lamaran-view">


    <p>
        <span class="pull-right">
             <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default', 'title' => 'Kembali']) ?>
        </span>
    <h4 class="el-subtitle">Pengajuan Lamaran Kerja Yang Diterima</h4>
    Data dari lamaran kerja yang telah anda ajukan.
    </p>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'lamaranID',
            //'lamaranUserID',
            //'lamaranLowonganID',
            [
                'attribute' => 'lamaranLowonganID',
                'format' => 'html',
                'value' => function($model){
                    $lowongan = \frontend\models\Dashboard\DashboardLowongan::findOne($model->lamaranLowonganID);
                    $perusahaan = \common\models\WebPerusahaan\WebPerusahaan::findOne($lowongan['lowonganPerusahaanID']);
                    return "<b><a href='".Yii::$app->urlManager->createUrl(['site/lowongan-detail', 'id' => $model->lamaranLowonganID])."' target='_blank'>".$lowongan['lowonganNama']."<br><small>".$perusahaan['perusahaanNama']."</small></a></b>";

                },
            ],
            'lamaranPermohonan:html',
            'lamaranTglMelamar:datetime',
            'lamaranKeteranganLamaran:ntext',
            'lamaranStatus:ntext',
        ],
    ]) ?>

</div>
