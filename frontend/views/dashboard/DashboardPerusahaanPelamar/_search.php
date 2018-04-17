<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardLowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-lowongan-search panel panel-body panel-default">

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-lg-12">
        <p>
            Cari berdasarkan:
        </p>
            </div>
        </div>
    </div>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-lg-12">
        <?= $form->field($model, 'lowonganNama')->textInput(['placeholder' => 'Judul Lowongan'])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-lg-12">
        <?= $form->field($model, 'lowonganID')->textInput(['placeholder' => 'ID Lowongan'])->label(false) ?>
            </div>
        </div>

    <?php // $form->field($model, 'lowonganPerusahaanID') ?>

        <div class="form-group">
            <div class="col-lg-12">
    <?= $form->field($model, 'lowonganKategoriLowonganID')->textInput(['placeholder' => 'Kategori Lowongan'])->label(false) ?>
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="form-group">
            <div class="col-lg-12">
    <?= $form->field($model, 'lowonganFungsiPekerjaan')->textInput(['placeholder' => 'Fungsi Pekerjaan'])->label(false) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">
    <?= $form->field($model, 'lowonganStatus')->textInput(['placeholder' => 'Status Lowongan'])->label(false) ?>
            </div>
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

    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-lg-12">
                <div class="pull-right">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-warning']) ?>
                    <?= Html::resetButton('<i class="fa fa-eraser"></i> Reset', ['class' => 'btn btn-default']) ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
