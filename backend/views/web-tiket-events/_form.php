<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebTiketEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-tiket-events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiketEventsEventsID')->textInput() ?>

    <?= $form->field($model, 'tiketEventsUserID')->textInput() ?>

    <?= $form->field($model, 'tiketEventsStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
