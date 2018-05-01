<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebBerkasPelamarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-berkas-pelamar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'berkasPelamarID') ?>

    <?= $form->field($model, 'berkasPelamarUserID') ?>

    <?= $form->field($model, 'berkasPelamarNama') ?>

    <?= $form->field($model, 'berkasPelamarFile') ?>

    <?= $form->field($model, 'berkasPelamarStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
