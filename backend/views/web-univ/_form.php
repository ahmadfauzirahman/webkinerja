<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-univ-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'univNama')->textInput(['maxlength' => true,'placeholder' =>'Nama Universitas']) ?>

    <?= $form->field($model, 'univStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
