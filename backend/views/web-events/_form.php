<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-events-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'eventsJudul')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'eventsTanggalMulai')->widget(DatePicker::className(),[
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
        'pluginOptions' => [
                'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'eventsTanggalSelesai')->widget(DatePicker::className(),[
        'options' => ['placeholder'=>'Masukkan Tanggal Selesai'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'eventsLokasi')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'eventsKeterangan')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'eventsThumbnails')->widget(FileInput::className(),[
            'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
                'initialPreview' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'eventsStatus')->dropDownList(['aktif'=>'Aktif','tidak-aktif'=>'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
