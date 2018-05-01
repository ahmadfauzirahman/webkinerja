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

    <?= $form->field($model, 'presentasiPerusahaanID')->widget(\kartik\select2\Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WebPerusahaan::find()->all(),
            'perusahaanID', 'perusahaanNama'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Nama Perusahaan .... ',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'presentasiEventsID')->hiddenInput(['value'=>$id])->label(false) ?>

    <?= $form->field($model, 'presentasiTglMulai')->widget(DateTimePicker::className(), [
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
        'pluginOptions' => [
                'autoClose' => 'true',
            'format' => 'yyyy-mm-dd hh:ii'
        ]
    ]) ?>

    <?= $form->field($model, 'presentasiTglSelesai')->widget(DateTimePicker::className(), [
        'options' => ['placeholder'=>'Masukkan Tanggal Selesai'],
        'pluginOptions' => [
            'autoClose' => 'true',
            'format' => 'yyyy-mm-dd HH:ii'
        ]
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
