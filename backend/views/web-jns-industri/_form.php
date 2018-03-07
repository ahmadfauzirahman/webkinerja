<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebJnsIndustri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-jns-industri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jnsIndustriNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jnsIndustriStatus')->dropDownList(['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
