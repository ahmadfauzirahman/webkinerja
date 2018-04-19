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
                <?= $form->field($model, 'bookingPerusahaanEmail')->textInput(['value'=>$perusahaan->perusahaanEmail])->label(false) ?>
            </div>
        </div>
    <hr>
        <div class="form-group">
            <label for="" class="col-md-4">Nama Perusahaan Anda <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanNama')->textInput(['value'=>$perusahaan->perusahaanNama])->label(false) ?>
            </div>
        </div>
        <div class="form-group" >
            <label for="" class="col-md-4">Jenis Perusahaan <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingJnsIndustriID')->widget(\kartik\select2\Select2::className(), [
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\WebJnsIndustri::find()->all(),
                        'jnsIndustriID', 'jnsIndustriNama'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Pilih Jenis Perusahaan .... ','value'=>$perusahaan->perusahaanJnsIndustriID],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">No telp Perusahaan <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanTelfon')->textInput(['value'=>$perusahaan->perusahaanTelfon])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">Nama Officer <span class="text-danger">*</span></label>
            <div class="col-md-8" style="text-align: left">
                <?= $form->field($model, 'bookingPerusahaanNamaOfficer')->textInput(['value'=>$perusahaan->perusahaanNamaOfficer])->label(false) ?>
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
                <?= $form->field($model, 'bookingPerusahaanTelfonOfficer')->textInput(['value'=>$perusahaan->perusahanHpOfficer])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-4">Pesan/Catatan</label>
            <div class="col-md-8">
                <?= $form->field($model, 'bookingCatatan')->label(false)->textarea(['col'=>3]) ?>
            </div>
        </div>

        <?= $form->field($model, 'bookingStatus')->hiddenInput(['value'=>'Booking'])->label(false) ?>
    
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4" style="text-align: left">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton('Batal', ['class' => 'btn btn-primary']) ?>
            </div>

        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form-booking -->
