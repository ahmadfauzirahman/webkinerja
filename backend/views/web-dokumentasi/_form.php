<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\WebDokumentasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-dokumentasi-form">

    <?php $form = ActiveForm::begin(['options' => [
            'enctype' => 'multipart/form-data'
    ]]); ?>

    <?= $form->field($model, 'dokumentasiEventsID')->hiddenInput(['value'=>$id])->label(false) ?>

    <?= $form->field($model, 'DokumentasiFoto[]')->widget(FileInput::className(),[
        'options' => ['accept' => 'image/*', 'multiple'=>true],
        'pluginOptions' => [
            'initialPreview' => true,
            'previewFileType' => 'image'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
