<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardUserPremiumTransaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-user-premium-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'userPremiumTransaksiNama')->textInput(['placeholder' => 'nama pemilik rekening'])->label('Nama Pemilik Rekening') ?>
        <?= $form->field($model, 'userPremiumTransaksiNoRek')->textInput(['placeholder' => 'nomor rekening pengirim'])->label('Nomor Rekening Pengirim') ?>
        <?= $form->field($model, 'userPremiumTransaksiTglTransaksi')->widget(\kartik\widgets\DatePicker::className(),[
            'options' => [
                'placeholer' => "masukkan tanggal..."
            ],
            'pluginOptions' => [
                'autoclose' => TRUE,
            ],
        ])->label('Tanggal Transfer') ?>
        <?= $form->field($model, 'userPremiumTransaksiNominal')->textInput(['placeholder' => 'jumlah yang ditransfer'])->label('Jumlah Yang Ditransfer') ?>

        <?= $form->field($model, 'userPremiumTransaksiKeterangan')->textarea(['placeholder' => 'catatan anda'])->label('Catatan Anda') ?>

    </div>
    <div class="col-md-6">
        <?php
        $data = isset($model->userPremiumTransaksiBukti) ? [
            'options' => [
                'multiple' => FALSE,
            ],
            'pluginOptions' => [
                'initialPreviewShowDelete' => FALSE,
                'initialPreview' => Yii::$app->request->baseUrl.'./../../backend/web/buktitransfer/'. $model->userPremiumTransaksiBukti,
                'initialPreviewAsData' => TRUE,
                'initialCaption' => FALSE,
                'showUpload' => FALSE,
                'showCancel' => FALSE,
                'showRemove' => FALSE,
            ],
        ] : [];
        ?>
        <?= $form->field($model, 'userPremiumTransaksiBukti')->
        widget(\kartik\file\FileInput::className(), $data ,['value'=> $model->userPremiumTransaksiBukti]) ?>
        <div class="form-group">
            <?= Html::submitButton('Kirim', ['class' => 'btn btn-lg btn-block btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
