<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriStand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-stand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoriStandNama')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Kategori']) ?>

    <?= $form->field($model, 'kategoriStandFasilitas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kategoriStandHarga')->textInput(['placeholder' => 'Masukkan Harga']) ?>

    <?= $form->field($model, 'kategoriStandStatus')->dropDownList(['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
