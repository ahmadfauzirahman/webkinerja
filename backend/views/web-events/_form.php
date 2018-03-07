<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-events-form row">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <div class="col-md-12">
        <?= $form->field($model, 'eventsJudul')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'eventsTanggalMulai')->widget(DatePicker::className(),[
            'options' => ['placeholder'=>'Masukkan Tanggal Mulai'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'eventsTanggalSelesai')->widget(DatePicker::className(),[
            'options' => ['placeholder'=>'Masukkan Tanggal Selesai'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'eventsLokasi')->textInput() ?>
    </div>

   <div class="col-md-6">
       <?= $form->field($model, 'eventsKeterangan')->textarea(['rows' => 6]) ?>
   </div>

    <div class="col-md-6">
        <?php $data = isset($model->eventsThumbnails) ? [
            'pluginOptions' => [
                'initialPreview' => 'foto_events/' . $model->eventsThumbnails,
                'initialPreviewAsData' => TRUE,
            ],
        ] : []; ?>
        <?= $form->field($model, 'eventsThumbnails')->widget(FileInput::className(),$data) ?>

        <?= $form->field($model, 'eventsStatus')->dropDownList(['aktif'=>'Aktif','tidak-aktif'=>'Tidak Aktif']) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>










    <?php ActiveForm::end(); ?>

</div>
