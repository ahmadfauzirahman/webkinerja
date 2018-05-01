<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoriLowonganNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kategoriLowonganStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
