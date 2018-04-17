<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardSeleksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-seleksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'seleksiID') ?>

    <?= $form->field($model, 'seleksiLowonganID') ?>

    <?= $form->field($model, 'seleksiKategoriSeleksiID') ?>

    <?= $form->field($model, 'seleksiNama') ?>

    <?= $form->field($model, 'seleksiTglAwal') ?>

    <?php // echo $form->field($model, 'seleksiTglAkhir') ?>

    <?php // echo $form->field($model, 'seleksiTempat') ?>

    <?php // echo $form->field($model, 'seleksiRuangan') ?>

    <?php // echo $form->field($model, 'seleksiKeterangan') ?>

    <?php // echo $form->field($model, 'seleksiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
