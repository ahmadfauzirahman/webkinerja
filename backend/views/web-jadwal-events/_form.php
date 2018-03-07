<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-jadwal-events-form row">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jadwalEventsEventsID')->hiddenInput(['value'=>$id])->label(false)?>

    <div class="col-md-6">
        <?= $form->field($model, 'jadwalEventsTglMulai')->widget(DateTimePicker::className(),[
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
            'pluginOptions' => [
                'autoClose' => true,
                'format' => 'yyyy-mm-dd hh:i:s'
            ]
        ]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'jadwalEventsTglSelesai')->widget(DateTimePicker::className(),[
            'options' => ['placeholder' => 'Masukkan Tanggal Selesai'],
            'pluginOptions' => [
                'autoClose' => true,
                'format' => 'yyyy-mm-dd hh:i:s'
            ]
        ]) ?>
    </div>

    <div class="col-md-8">
        <?= $form->field($model, 'jadwalEventsNama')->widget(\marqu3s\summernote\Summernote::className(), [
            'clientOptions' => [
                'lang' => 'id'
            ]
        ]);
         ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'jadwalEventsStatus')->dropDownList(['aktif'=>'Aktif', 'tidak-aktif'=>'Tidak Aktif']) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
