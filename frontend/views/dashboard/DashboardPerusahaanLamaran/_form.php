<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanLamaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-perusahaan-lamaran-form">

    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/ckeditor.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample.js"></script>
    <?php $form = ActiveForm::begin(); ?>

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index','lowongan' => $lowongan], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?>
            <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span>
    <h4 class="el-subtitle"><small>List Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar calon pelamar pekerjaan pada lowongan yang anda publish.
    </p>
    <hr/>

    <div class="form-group">
        <div class="col-lg-6">
    <?= $form->field($model, 'lamaranUserID')->textInput(['placeholder' => 'user id','required' => 'required'])->label("ID User") ?>
        </div>
    </div>

    <?php //= $form->field($model, 'lamaranLowonganID')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-6">
    <?php
    if(isset($model->lamaranTglMelamar)){
        $tgl = $model->lamaranTglMelamar;
    } else {
        $tgl = date('Y-m-d h:i:s');
    }
    ?>
    <?= $form->field($model, 'lamaranTglMelamar')->widget(\kartik\widgets\DateTimePicker::className(),[
        'options' => [
            'placeholer' => "masukkan tgl. melamar..."
        ],
        'value' => $tgl,
        'pluginOptions' => [
            'autoclose' => TRUE,
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayHighlight' => TRUE,
        ],]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12">
    <?= $form->field($model, 'lamaranPermohonan')->textarea(['id' => 'editor']) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12">
    <?= $form->field($model, 'lamaranKeteranganLamaran')->textarea(['rows' => 6,'placeholder' => 'keterangan lainnya...']) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-6">
    <?= $form->field($model, 'lamaranRekomendasi')->dropDownList(['' => '-','Ya' => 'Ya']) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-6">
    <?= $form->field($model, 'lamaranStatus')->dropDownList(['Pending Review' => 'Pending Review','Diterima' => 'Diterima', 'Ditolak' => 'Ditolak'],['prompt' => 'pilih status lamaran...','required' => 'required']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <script>
        initSample();
    </script>

</div>
