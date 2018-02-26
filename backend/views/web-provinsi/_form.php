<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebProvinsi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-provinsi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provinsiNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsiStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
