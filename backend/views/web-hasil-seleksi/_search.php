<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebHasilSeleksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-hasil-seleksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'hasilSeleksiID') ?>

    <?= $form->field($model, 'hasilSeleksiSeleksiID') ?>

    <?= $form->field($model, 'hasilSeleksiUserID') ?>

    <?= $form->field($model, 'hasilSeleksiLamaranID') ?>

    <?= $form->field($model, 'hasilSeleksiHasil') ?>

    <?php // echo $form->field($model, 'hasilSeleksiKeterangan') ?>

    <?php // echo $form->field($model, 'hasilSeleksiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
