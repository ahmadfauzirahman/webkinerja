<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebPerusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-perusahaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'perusahaanUserID')->textInput() ?>

    <?= $form->field($model, 'perusahaanNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perusahaanJnsIndustriID')->textInput() ?>

    <?= $form->field($model, 'perusahaanAlamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perusahaanEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanLink')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perusahaanTelfon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanNegaraID')->textInput() ?>

    <?= $form->field($model, 'perusahaanProvinsiID')->textInput() ?>

    <?= $form->field($model, 'perusahaanKotaID')->textInput() ?>

    <?= $form->field($model, 'perusahaanKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanProfil')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perusahaanNamaOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanEmailOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanTelfonOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahanHpOfficer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaanStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
