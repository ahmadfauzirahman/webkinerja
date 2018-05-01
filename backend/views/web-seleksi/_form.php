<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebSeleksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-seleksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seleksiLowonganID')->textInput() ?>

    <?= $form->field($model, 'seleksiKategoriSeleksiID')->textInput() ?>

    <?= $form->field($model, 'seleksiNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seleksiTglAwal')->textInput() ?>

    <?= $form->field($model, 'seleksiTglAkhir')->textInput() ?>

    <?= $form->field($model, 'seleksiTempat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seleksiRuangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seleksiKeterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seleksiStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
