<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriSeleksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-seleksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoriSeleksiNama')->textInput(['rows' => 6,'placeholder' => 'nama kategori seleksi']) ?>

    <?= $form->field($model, 'kategoriSeleksiStatus')->dropDownList(['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
