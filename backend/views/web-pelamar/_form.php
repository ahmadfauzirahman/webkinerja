<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebPelamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-pelamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pelamarUserID')->textInput() ?>

    <?= $form->field($model, 'pelamarNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarJK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarTmptLahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarTglLahir')->textInput() ?>

    <?= $form->field($model, 'pelamarKewarganegaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarTinggiBadan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarBeratBadan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarGolDarah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarAgama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarAlamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarTelfon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarPendididkanFormal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarPendidikanNonFormal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarKemampuan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarPengalamanAkademik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarPengalamanKerja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarFoto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelamarNamaAyah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarPekerjaanAyah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarNamaIbu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarPekerjaanIbu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelamarStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
