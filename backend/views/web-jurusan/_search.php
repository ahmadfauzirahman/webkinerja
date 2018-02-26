<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebJurusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-jurusan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'jurusanID') ?>

    <?= $form->field($model, 'jurusanNama') ?>

    <?= $form->field($model, 'jurusanFakultasID') ?>

    <?= $form->field($model, 'jurusanStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
