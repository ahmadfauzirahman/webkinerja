<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebFakultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-fakultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'fakultasID') ?>

    <?= $form->field($model, 'fakultasNama') ?>

    <?= $form->field($model, 'fakultasUnivID') ?>

    <?= $form->field($model, 'fakultasStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
