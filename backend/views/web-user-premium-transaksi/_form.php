<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumTransaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-user-premium-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userPremiumID')->textInput(['readonly' => 'readonly']) ?>

    <?php // $form->field($model, 'userID')->textInput() ?>
    <div class="form-group">
        <label class="control-label">Nama Perusahaan</label>
        <?php
        $namaPerusahaan = \common\models\WebPerusahaan::find()->where(['perusahaanUserID' => $model->userID])->one()['perusahaanNama'];
        ?>
        <input type="text" class="form-control" readonly="readonly" value="<?= $namaPerusahaan; ?>"/>
    </div>

    <?= $form->field($model, 'userPremiumTransaksiNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userPremiumTransaksiNoRek')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userPremiumTransaksiTglTransaksi')->textInput() ?>

    <?= $form->field($model, 'userPremiumTransaksiTglKonfirmasi')->textInput() ?>

    <?= $form->field($model, 'userPremiumTransaksiNominal')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'userPremiumTransaksiBukti')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <label class="control-label">Bukti Transaksi</label>
        <a class="btn btn-lg" href="<?= Yii::$app->request->baseUrl.'/buktitransfer/'.$model->userPremiumTransaksiBukti ?>" target="_blank"><img src="<?= Yii::$app->request->baseUrl.'/buktitransfer/'.$model->userPremiumTransaksiBukti ?>" width="80px" height="auto"/></a>
    </div>

    <?= $form->field($model, 'userPremiumTransaksiKeterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userPremiumTransaksiStatus')->dropDownList([ 'Konfirmasi Admin' => 'Konfirmasi Admin', 'Transaksi Diterima' => 'Transaksi Diterima', 'Transaksi Ditolak' => 'Transaksi Ditolak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
