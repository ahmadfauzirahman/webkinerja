<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebPelamarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-pelamar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pelamarID') ?>

    <?= $form->field($model, 'pelamarUserID') ?>

    <?= $form->field($model, 'pelamarNama') ?>

    <?= $form->field($model, 'pelamarJK') ?>

    <?= $form->field($model, 'pelamarTmptLahir') ?>

    <?php // echo $form->field($model, 'pelamarTglLahir') ?>

    <?php // echo $form->field($model, 'pelamarKewarganegaraan') ?>

    <?php // echo $form->field($model, 'pelamarTinggiBadan') ?>

    <?php // echo $form->field($model, 'pelamarBeratBadan') ?>

    <?php // echo $form->field($model, 'pelamarGolDarah') ?>

    <?php // echo $form->field($model, 'pelamarAgama') ?>

    <?php // echo $form->field($model, 'pelamarAlamat') ?>

    <?php // echo $form->field($model, 'pelamarTelfon') ?>

    <?php // echo $form->field($model, 'pelamarEmail') ?>

    <?php // echo $form->field($model, 'pelamarPendididkanFormal') ?>

    <?php // echo $form->field($model, 'pelamarPendidikanNonFormal') ?>

    <?php // echo $form->field($model, 'pelamarKemampuan') ?>

    <?php // echo $form->field($model, 'pelamarPengalamanAkademik') ?>

    <?php // echo $form->field($model, 'pelamarPengalamanKerja') ?>

    <?php // echo $form->field($model, 'pelamarFoto') ?>

    <?php // echo $form->field($model, 'pelamarNamaAyah') ?>

    <?php // echo $form->field($model, 'pelamarPekerjaanAyah') ?>

    <?php // echo $form->field($model, 'pelamarNamaIbu') ?>

    <?php // echo $form->field($model, 'pelamarPekerjaanIbu') ?>

    <?php // echo $form->field($model, 'pelamarStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
