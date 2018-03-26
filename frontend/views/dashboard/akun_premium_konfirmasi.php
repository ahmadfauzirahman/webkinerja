<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardUserPremium */
/* @var $form ActiveForm */

$this->title = "Konfirmasi Akun Premium";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-akun_premium_konfirmasi">

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
                'initialPreview' => '../../backend/web/buktitransfer/'. $model->userPremiumTransaksiBukti,
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
            <?= Html::submitButton('Kofirmasi', ['class' => 'btn btn-lg btn-block btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- dashboard-akun_premium_konfirmasi -->
