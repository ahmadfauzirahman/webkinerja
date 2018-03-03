<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-jadwal-events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jadwalEventsEventsID')->hiddenInput(['value'=>$id])->label(false)?>

    <?= $form->field($model, 'jadwalEventsTglMulai')->widget(DateTimePicker::className(),[
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
        'pluginOptions' => [
                'autoClose' => true,
            'format' => 'yyyy-mm-dd hh:i:s'
        ]
    ]) ?>

    <?= $form->field($model, 'jadwalEventsTglSelesai')->widget(DateTimePicker::className(),[
            'options' => ['placeholder' => 'Masukkan Tanggal Selesai'],
        'pluginOptions' => [
                'autoClose' => true,
            'format' => 'yyyy-mm-dd hh:i:s'
        ]
    ]) ?>

    <?= $form->field($model, 'jadwalEventsNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jadwalEventsStatus')->dropDownList(['aktif'=>'Aktif', 'tidak-aktif'=>'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
