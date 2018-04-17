<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebBooking */
/* @var $form ActiveForm */
?>
<div class="form-booking">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'bookingEventsID')->hiddenInput(['value'=>$id])->label(false) ?>
        <?= $form->field($model, 'bookingStandsID')->hiddenInput(['value'=>$id_stand])->label(false) ?>
        <div class="form-group" >
            <label for="" class="col-md-4">Email Anda <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left" >
                <?= $form->field($model, 'bookingPerusahaanEmail')->label(false)->hint('Masukkan Email akun suska karir anda jika ada') ?>
            </div>
        </div>
    <hr>
        <div class="form-group">
            <label for="" class="col-md-4">Nama Perusahaan Anda <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanNama')->label(false) ?>
            </div>
        </div>
        <div class="form-group" >
            <label for="" class="col-md-4">Jenis Perusahaan <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingJnsIndustriID')->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">No telp Perusahaan <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanTelfon')->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">Nama Officer <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanNamaOfficer')->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">Jabatan Officer <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanJbtnOfficer')->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">No Telp Officer <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanTelfonOfficer')->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">Pesan/Catatan</label>
            <div class="col-md-8">
                <?= $form->field($model, 'bookingCatatan')->label(false)->textarea(['col'=>3]) ?>
            </div>
        </div>

        <?= $form->field($model, 'bookingStatus')->hiddenInput()->label(false) ?>
    
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4" style="text-align: left">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton('Batal', ['class' => 'btn btn-primary']) ?>
            </div>

        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form-booking -->
