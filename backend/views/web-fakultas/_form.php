<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebFakultas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-fakultas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fakultasUnivID')->
    dropDownList(\yii\helpers\ArrayHelper::
    map(\common\models\WebUniv::find()->all(),'univID','univNama'),['prompt'=>'Pilih Nama Universitas']) ?>

    <?= $form->field($model, 'fakultasNama')->textInput(['maxlength' => true,'placeholder'=>'Nama Fakultas']) ?>

    <?= $form->field($model, 'fakultasStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
