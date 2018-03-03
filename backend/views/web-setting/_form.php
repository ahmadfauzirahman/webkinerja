<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'settingSiteTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'settingSiteDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'settingMetaKeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'settingCredits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'settingFoto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
