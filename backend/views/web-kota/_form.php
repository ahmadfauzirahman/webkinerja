<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kotaProvinsiID')->textInput() ?>

    <?= $form->field($model, 'kotaNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kotaStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
