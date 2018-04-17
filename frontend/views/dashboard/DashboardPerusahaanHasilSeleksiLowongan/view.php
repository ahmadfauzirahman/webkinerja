<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan */

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Hasil Seleksi Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-hasil-seleksi']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view','id' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => 'List Hasil Seleksi', 'url' => ['/dashboard-perusahaan-hasil-seleksi-lowongan/index','lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->hasilSeleksiID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-hasil-seleksi-lowongan-view">


    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['/dashboard-perusahaan-hasil-seleksi-lowongan', 'lowongan' => $lowongan], ['class' => 'btn btn-default', 'title' => 'kembali']) ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'lowongan' => $lowongan,'id' => $model->hasilSeleksiID], ['class' => 'btn btn-success', 'title' => 'Update']) ?>
        </span>
    <h4 class="el-subtitle"><small>Hasil Seleksi Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar hasil seleksi calon pelamar pekerjaan pada lowongan yang anda publish.
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hasilSeleksiID',
            'hasilSeleksiLamaranID',
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
            [
                'attribute' => 'hasilSeleksiHasil',
                'format' => 'html',
                'value' => function($model){
                    $s = '';
                    $data = json_decode($model->hasilSeleksiHasil);
                    foreach($data AS $d => $e){
                        $d = \frontend\models\Dashboard\DashboardSeleksi::findOne($d)['seleksiNama'];
                        if($d == ''){
                            $d = 'Undefine';
                        }
                        $s .= '<li>'.$d.' <b>('.$e.')</b></li>';
                    }
                    return '<ol>'.$s.'</ol>';
                },
            ],
            'hasilSeleksiKeterangan:ntext',
            'hasilSeleksiStatus:ntext',
        ],
    ]) ?>

</div>
