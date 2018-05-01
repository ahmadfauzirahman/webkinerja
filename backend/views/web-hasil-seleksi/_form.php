<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebHasilSeleksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-hasil-seleksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hasilSeleksiSeleksiID')->textInput() ?>

    <?= $form->field($model, 'hasilSeleksiUserID')->textInput() ?>

    <?= $form->field($model, 'hasilSeleksiLamaranID')->textInput() ?>

    <?= $form->field($model, 'hasilSeleksiHasil')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hasilSeleksiKeterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hasilSeleksiStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
