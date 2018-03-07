<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriStandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-stand-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'kategoriStandID') ?>

    <?= $form->field($model, 'kategoriStandNama') ?>

    <?= $form->field($model, 'kategoriStandFasilitas') ?>

    <?= $form->field($model, 'kategoriStandHarga') ?>

    <?= $form->field($model, 'kategoriStandStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
