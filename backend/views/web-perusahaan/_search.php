<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebPerusahaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-perusahaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'perusahaanID') ?>

    <?= $form->field($model, 'perusahaanUserID') ?>

    <?= $form->field($model, 'perusahaanNama') ?>

    <?= $form->field($model, 'perusahaanJnsIndustriID') ?>

    <?= $form->field($model, 'perusahaanAlamat') ?>

    <?php // echo $form->field($model, 'perusahaanEmail') ?>

    <?php // echo $form->field($model, 'perusahaanLink') ?>

    <?php // echo $form->field($model, 'perusahaanTelfon') ?>

    <?php // echo $form->field($model, 'perusahaanNegaraID') ?>

    <?php // echo $form->field($model, 'perusahaanProvinsiID') ?>

    <?php // echo $form->field($model, 'perusahaanKotaID') ?>

    <?php // echo $form->field($model, 'perusahaanKodePos') ?>

    <?php // echo $form->field($model, 'perusahaanProfil') ?>

    <?php // echo $form->field($model, 'perusahaanNamaOfficer') ?>

    <?php // echo $form->field($model, 'perusahaanEmailOfficer') ?>

    <?php // echo $form->field($model, 'perusahaanTelfonOfficer') ?>

    <?php // echo $form->field($model, 'perusahanHpOfficer') ?>

    <?php // echo $form->field($model, 'perusahaanStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
