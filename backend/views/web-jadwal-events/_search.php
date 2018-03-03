<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebJadwalEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-jadwal-events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'jadwalEventsID') ?>

    <?= $form->field($model, 'jadwalEventsEventsID') ?>

    <?= $form->field($model, 'jadwalEventsTglMulai') ?>

    <?= $form->field($model, 'jadwalEventsTglSelesai') ?>

    <?= $form->field($model, 'jadwalEventsNama') ?>

    <?php // echo $form->field($model, 'jadwalEventsStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
