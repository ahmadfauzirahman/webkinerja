<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kotaProvinsiID')->dropDownList(\yii\helpers\ArrayHelper::map(
       \common\models\WebProvinsi::find()->all(),'provinsiID','provinsiNama'),['prompt'=>'Pilih Nama Provinsi']) ?>

    <?= $form->field($model, 'kotaNama')->textInput(['maxlength' => true,'placeholder'=>'Masukan Nama Kota']) ?>

    <?= $form->field($model, 'kotaStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
