<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-presentasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'presentasiPerusahaanID')->textInput() ?>

    <?= $form->field($model, 'presentasiEventsID')->hiddenInput(['value'=>$id])->label(false) ?>

    <?= $form->field($model, 'presentasiTglMulai')->widget(DateTimePicker::className(), [
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
        'pluginOptions' => [
                'autoClose' => 'true',
            'format' => 'yyyy-mm-dd HH:ii'
        ]
    ]) ?>

    <?= $form->field($model, 'presentasiTglSelesai')->widget(DateTimePicker::className(), [
        'options' => ['placeholder'=>'Masukkan Tanggal Selesai'],
        'pluginOptions' => [
            'autoClose' => 'true',
            'format' => 'yyyy-mm-dd HH:ii'
        ]
    ]) ?>

    <?= $form->field($model, 'webPresentasiStatus')->dropDownList(['ajukan'=>'Ajukan', 'setujui'=>'Setujui', 'batalkan'=>'Batalkan']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
