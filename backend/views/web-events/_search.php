<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'eventsID') ?>

    <?= $form->field($model, 'eventsJudul') ?>

    <?= $form->field($model, 'eventsTanggalMulai') ?>

    <?= $form->field($model, 'eventsTanggalSelesai') ?>

    <?= $form->field($model, 'eventsLokasi') ?>

    <?php // echo $form->field($model, 'eventsKeterangan') ?>

    <?php // echo $form->field($model, 'eventsThumbnails') ?>

    <?php // echo $form->field($model, 'eventsStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
