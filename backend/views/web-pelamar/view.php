<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebPelamar */

$this->title = $model->pelamarID;
$this->params['breadcrumbs'][] = ['label' => 'Web Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-pelamar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pelamarID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pelamarID], [
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
            'pelamarID',
            'pelamarUserID',
            'pelamarNama',
            'pelamarJK',
            'pelamarTmptLahir',
            'pelamarTglLahir',
            'pelamarKewarganegaraan',
            'pelamarTinggiBadan',
            'pelamarBeratBadan',
            'pelamarGolDarah',
            'pelamarAgama',
            'pelamarAlamat:ntext',
            'pelamarTelfon',
            'pelamarEmail:email',
            'pelamarPendididkanFormal:ntext',
            'pelamarPendidikanNonFormal:ntext',
            'pelamarKemampuan:ntext',
            'pelamarPengalamanAkademik:ntext',
            'pelamarPengalamanKerja:ntext',
            'pelamarFoto:ntext',
            'pelamarNamaAyah',
            'pelamarPekerjaanAyah',
            'pelamarNamaIbu',
            'pelamarPekerjaanIbu',
            'pelamarStatus:ntext',
        ],
    ]) ?>

</div>
