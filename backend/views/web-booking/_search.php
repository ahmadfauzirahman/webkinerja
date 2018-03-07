<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebBookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'bookingID') ?>

    <?= $form->field($model, 'bookingEventsID') ?>

    <?= $form->field($model, 'bookingStandsID') ?>

    <?= $form->field($model, 'bookingPerusahaanEmail') ?>

    <?= $form->field($model, 'bookingPerusahaanNama') ?>

    <?php // echo $form->field($model, 'bookingJnsIndustriID') ?>

    <?php // echo $form->field($model, 'bookingPerusahaanTelfon') ?>

    <?php // echo $form->field($model, 'bookingPerusahaanNamaOfficer') ?>

    <?php // echo $form->field($model, 'bookingPerusahaanJbtnOfficer') ?>

    <?php // echo $form->field($model, 'bookingPerusahaanTelfonOfficer') ?>

    <?php // echo $form->field($model, 'bookingCatatan') ?>

    <?php // echo $form->field($model, 'bookingBuktiPembayaran') ?>

    <?php // echo $form->field($model, 'bookingStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
