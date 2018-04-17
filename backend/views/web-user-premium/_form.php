<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremium */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-user-premium-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'userID')->textInput() ?>
    <div class="form-group">
        <label class="control-label">Nama Perusahaan</label>
        <?php
            $namaPerusahaan = \common\models\WebPerusahaan::find()->where(['perusahaanUserID' => $model->userID])->one()['perusahaanNama'];
        ?>
        <input type="text" class="form-control" readonly="readonly" value="<?= $namaPerusahaan; ?>"/>
    </div>

    <?= $form->field($model, 'userPremiumAwal')->textInput() ?>

    <?= $form->field($model, 'userPremiumAkhir')->textInput() ?>

    <?= $form->field($model, 'userPremiumKeterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userPremiumStatus')->dropDownList(['Pending' => 'Pending','Konfirmasi Admin' => 'Konfirmasi Admin','Aktif' => 'Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
