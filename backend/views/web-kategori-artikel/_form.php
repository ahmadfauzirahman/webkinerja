<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriArtikel\WebKategoriArtikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-artikel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoriArtikelNama')->textInput(['placeholder' => 'Nama Kategori Artikel'])->label('Nama Kategori Artikel') ?>

    <?= $form->field($model, 'kategoriArtikelStatus')->dropDownList(['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif'])->label('Status Kategori Artikel') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
