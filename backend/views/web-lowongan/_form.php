<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lowonganPerusahaanID')->textInput() ?>

    <?= $form->field($model, 'lowonganKategoriLowonganID')->textInput() ?>

    <?= $form->field($model, 'lowonganNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganFungsiPekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lowonganLevelPekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lowonganTipePekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lowonganStatusPekerjaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganSyaratUmum')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganJenjangPendidikan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganJurusan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganIpkMinimal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lowonganSyaratKhusus')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganJobDesk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganKeterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganTglPost')->textInput() ?>

    <?= $form->field($model, 'lowonganValid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganDaftarOnline')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lowonganStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
