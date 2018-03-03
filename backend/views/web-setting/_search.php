<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebSettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'settingID') ?>

    <?= $form->field($model, 'settingSiteTitle') ?>

    <?= $form->field($model, 'settingSiteDescription') ?>

    <?= $form->field($model, 'settingMetaKeyword') ?>

    <?= $form->field($model, 'settingCredits') ?>

    <?php // echo $form->field($model, 'settingFoto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
