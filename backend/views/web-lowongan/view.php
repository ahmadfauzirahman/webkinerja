<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebLowongan */

$this->title = $model->lowonganID;
$this->params['breadcrumbs'][] = ['label' => 'Web Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-lowongan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lowonganID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lowonganID], [
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
            'lowonganID',
            'lowonganPerusahaanID',
            'lowonganKategoriLowonganID',
            'lowonganNama:ntext',
            'lowonganFungsiPekerjaan',
            'lowonganLevelPekerjaan',
            'lowonganTipePekerjaan',
            'lowonganStatusPekerjaan:ntext',
            'lowonganSyaratUmum:ntext',
            'lowonganJenjangPendidikan:ntext',
            'lowonganJurusan:ntext',
            'lowonganIpkMinimal',
            'lowonganSyaratKhusus:ntext',
            'lowonganJobDesk:ntext',
            'lowonganKeterangan:ntext',
            'lowonganTglPost',
            'lowonganValid:ntext',
            'lowonganDaftarOnline:ntext',
            'lowonganStatus:ntext',
        ],
    ]) ?>

</div>
