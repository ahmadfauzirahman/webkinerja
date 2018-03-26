<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardLowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-lowongan-search">

<div class="row">

    <?php $form = ActiveForm::begin([
        'action' => ['lowongan'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-12">
     <div class="col-lg-7">
                <?= $form->field($model, 'lowonganNama')->textInput(['placeholder' => 'Cari lowongan disini...'])->label(false) ?>
     </div>
     <div class="col-lg-3">
                <?= $form->field($model, 'lowonganKategoriLowonganID')->dropDownList(['1'=>'Lowongan Kerja','2' => 'Lowongan Magang'],['prompt' => 'Kategori lowongan...'])->label(false) ?>
     </div>
     <div class="col-lg-2">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-warning']) ?>
     </div>
    </div>

    <?php // echo $form->field($model, 'lowonganLevelPekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganTipePekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganStatusPekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganSyaratUmum') ?>

    <?php // echo $form->field($model, 'lowonganJenjangPendidikan') ?>

    <?php // echo $form->field($model, 'lowonganJurusan') ?>

    <?php // echo $form->field($model, 'lowonganIpkMinimal') ?>

    <?php // echo $form->field($model, 'lowonganSyaratKhusus') ?>

    <?php // echo $form->field($model, 'lowonganJobDesk') ?>

    <?php // echo $form->field($model, 'lowonganKeterangan') ?>

    <?php // echo $form->field($model, 'lowonganTglPost') ?>

    <?php // echo $form->field($model, 'lowonganValid') ?>

    <?php ActiveForm::end(); ?>
</div>
<br>
</div>
