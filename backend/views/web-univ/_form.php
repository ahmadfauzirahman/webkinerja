<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-univ-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'univNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'univStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
