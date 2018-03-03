<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebTiketEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-tiket-events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'tiketEventsID') ?>

    <?= $form->field($model, 'tiketEventsEventsID') ?>

    <?= $form->field($model, 'tiketEventsUserID') ?>

    <?= $form->field($model, 'tiketEventsStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
