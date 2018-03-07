<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebVenue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-venue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'venueNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venueStatus')->dropDownList(['Aktif'=>'Aktif', 'Tidak-Aktif'=>'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
