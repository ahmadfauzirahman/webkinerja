<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-presentasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'presentasiID') ?>

    <?= $form->field($model, 'presentasiEventsID') ?>

    <?= $form->field($model, 'presentasiTglMulai') ?>

    <?= $form->field($model, 'presentasiTglSelesai') ?>

    <?= $form->field($model, 'presentasiPerusahaanID') ?>

    <?php // echo $form->field($model, 'webPresentasiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
