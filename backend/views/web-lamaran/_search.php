<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebLamaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-lamaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'lamaranID') ?>

    <?= $form->field($model, 'lamaranUserID') ?>

    <?= $form->field($model, 'lamaranLowonganID') ?>

    <?= $form->field($model, 'lamaranPermohonan') ?>

    <?= $form->field($model, 'lamaranTglMelamar') ?>

    <?php // echo $form->field($model, 'lamaranKeteranganLamaran') ?>

    <?php // echo $form->field($model, 'lamaranStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
