<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebBooking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bookingEventsID')->textInput() ?>

    <?= $form->field($model, 'bookingStandsID')->textInput() ?>

    <?= $form->field($model, 'bookingPerusahaanEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingPerusahaanNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingJnsIndustriID')->textInput() ?>

    <?= $form->field($model, 'bookingPerusahaanTelfon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingPerusahaanNamaOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingPerusahaanJbtnOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingPerusahaanTelfonOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookingCatatan')->textarea(['rows' => 6]) ?>

    <?php $data = isset($model->eventsThumbnails) ? [
        'pluginOptions' => [
            'initialPreview' => 'foto_events/' . $model->eventsThumbnails,
            'initialPreviewAsData' => TRUE,
        ],
    ] : []; ?>
    <?= $form->field($model, 'bookingBuktiPembayaran')->widget(\kartik\file\FileInput::className(),$data) ?>

    <?= $form->field($model, 'bookingStatus')->dropDownList(['Booking'=>'Booking', 'Konfirmasi'=>'Sudah Konfirmasi']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
