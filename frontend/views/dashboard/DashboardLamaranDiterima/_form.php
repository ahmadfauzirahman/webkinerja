<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardPengajuanLamaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-pengajuan-lamaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lamaranUserID')->textInput() ?>

    <?= $form->field($model, 'lamaranLowonganID')->textInput() ?>

    <?= $form->field($model, 'lamaranPermohonan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lamaranTglMelamar')->textInput() ?>

    <?= $form->field($model, 'lamaranKeteranganLamaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lamaranStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
