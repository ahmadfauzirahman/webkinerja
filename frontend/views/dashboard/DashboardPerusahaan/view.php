<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaan */

$this->title = $model->perusahaanID;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-perusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->perusahaanID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->perusahaanID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'perusahaanID',
            'perusahaanUserID',
            'perusahaanNama:ntext',
            'perusahaanJnsIndustriID',
            'perusahaanAlamat:ntext',
            'perusahaanEmail:email',
            'perusahaanLink:ntext',
            'perusahaanTelfon',
            'perusahaanNegaraID',
            'perusahaanProvinsiID',
            'perusahaanKotaID',
            'perusahaanKodePos',
            'perusahaanProfil:ntext',
            'perusahaanNamaOfficer',
            'perusahaanEmailOfficer:email',
            'perusahaanTelfonOfficer',
            'perusahanHpOfficer',
            'perusahaanStatus:ntext',
        ],
    ]) ?>

</div>
