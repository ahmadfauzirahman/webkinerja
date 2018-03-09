<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="large-7 small-12 column text-center">
        <p class="el-title">Lebih dari <b>900</b> orang telah bergabung bersama kami. <br/>Apakah anda yang berikutnya?</p>
        <br/>
        <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc-section-img-02.png">
    </div>
    <div class="large-5 small-12 column">
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


                <?php // $form->field($model, 'foto')->fileInput()->label(false) ?>

                <?php // $form->field($model, 'tanggal_pendaftaran')->textInput()->label(false) ?>

                <?php // $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'perusahaan' => 'Perusahaan', 'alumni' => 'Alumni', ], ['prompt' => ''])->label(false) ?>

        <div class="form-group">
            <div class="col-lg-12">
                <hr/>
                <input type="checkbox" name="agree" required/> <small><i>Saya menetujui seluruh <a href="#"> peraturan dan kebijakan </a> yang berlaku pada sistem </i><b><?= Yii::$app->name; ?></b></small> <span class="text-danger">*</span>
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
