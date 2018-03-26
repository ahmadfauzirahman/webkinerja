<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="large-6 small-12 column text-center">
        <p class="el-title">Lebih dari <b>200</b> perusahaan telah bergabung bersama kami. <br/>Apakah perusahaan anda yang berikutnya?</p>
        <br/>
        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc-section-img-02.png">
    </div>
    <div class="large-6 small-12 column">
        <div class="form-group">
            <div class="col-lg-12">
                <p class="el-subtitle">Form Pendaftaran</p>
                <div class="divider float-left"></div>
                <br>
                <br>
                <div class="clear"></div>
            </div>
        </div>

        <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <label class="col-lg-4">Username <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder' => 'username'])->label(false) ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4">Password <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder' => 'password'])->label(false) ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-4">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'placeholder' => 'nama lengkap'])->label(false) ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-4">Alamat Email <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'alamat email','type' => 'email'])->label(false) ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-4">No. Telepon <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model, 'telepon')->textInput(['maxlength' => true,'placeholder' => 'ex. 0812xxxxxxxx'])->label(false) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12 text-center">
                <div class="badge"><small>Untuk tipe akun <span class="text-red">Premium</span> dikenakan biaya pendaftaran. <a href="<?= \common\models\WebSetting::findOne(1)['settingPageGuide'] ?>" target="_blank">Pelajari lebih lanjut</a></small></div>
                <br>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-5">Tipe Akun Perusahaan <span class="text-danger">*</span></label>
            <div class="col-lg-7">
                <?= $form->field($model, 'role')->radioList(['perusahaan-premium' => 'Perusahaan (Premium)', 'perusahaan-non-premium' => 'Perusahaan (Non-Premium)'])->label(false); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4">Nama Perusahaan<span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <?= $form->field($model2, 'perusahaanNama')->textInput(['maxlength' => true,'placeholder' => 'nama perusahaan'])->label(false) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">
                <hr/>
                <input type="checkbox" name="agree" required/> <small><i>Saya menetujui seluruh <a href="<?= \common\models\WebSetting::findOne(1)['settingPagePeraturanKebijakan'] ?>" target="_blank"> peraturan dan kebijakan </a> yang berlaku pada sistem </i><b><?= Yii::$app->name; ?></b></small> <span class="text-danger">*</span>
                <hr/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Buat Akun', ['class' => 'btn btn-lg btn-block btn-success']) ?>
            </div>
        </div>

        <div class="from-group">
            <div class="col-lg-12"><p><small>Sudah memiliki akun? Silahkan login di <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>"><b>sini.</b></a></small></p></div>
        </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>
