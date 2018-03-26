<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">

        <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Username']) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Masukan Password']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Lengkap']) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Masukan Email']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true,'placeholder'=>'Masukan Nomor Hp']) ?>

        <?= $form->field($model, 'role')->dropDownList(
            ['admin' => 'Admin', 'perusahaan' => 'Perusahaan','alumni'=>'Alumni'],
            ['prompt' => 'Pilih Hak Akses'],['prompt'=>'Pilih Role']
        ) ?>
        <?php
        $data = isset($model->foto) ? [
            'pluginOptions' => [
                'initialPreview' => 'foto/' . $model->foto,
                'initialPreviewAsData' => TRUE,
                'initialCaption' => [
                    'value' => $model->nama,
                ]
            ],
        ] : [];
        ?>
        <?= $form->field($model, 'foto')->
        widget(\kartik\file\FileInput::className(), $data ,['value'=> $model->foto]) ?>
        <div class="form-group">
            <?= Html::submitButton(
                "&nbsp;<span class='fa fa-save'></span>&nbsp;" . ($model->isNewRecord ?
                    Yii::t('app', 'Create') :
                    Yii::t('app', 'Update')),
                ['class' => $model->isNewRecord ? 'btn btn-lg btn-block  btn-success' : 'btn btn-lg btn-block btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
