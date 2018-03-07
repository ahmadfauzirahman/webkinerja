<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebStandsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-stands-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'standsID') ?>

    <?= $form->field($model, 'standsVenueID') ?>

    <?= $form->field($model, 'standsEventsID') ?>

    <?= $form->field($model, 'standsNama') ?>

    <?= $form->field($model, 'standsKategoriStandID') ?>

    <?php // echo $form->field($model, 'standsPerusahaanID') ?>

    <?php // echo $form->field($model, 'standsStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
