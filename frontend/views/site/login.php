<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<br>
<br>
<!-- contact support -->
<div class="section  p-b-60 p-t-60" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png') no-repeat; box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-8 column">
            <div class="section-header animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <p class="el-subtitle">Login</p>
                    <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;">Silahkan isi form berikut ini untuk login!</h2>
                    <div class="divider float-left"></div>
                    <div class="clear"></div>
                    <p class="m-t-30">Belum memiliki akun? <a href="<?= Yii::$app->urlManager->createUrl('site/register') ?>"><b>Daftar Sekarang</b></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="large-4 column">
            <div class="section-header animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                    <div class="row">
                        <div class="col-lg-12">
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true,'type' => 'email','placeholder' => 'email']) ?>

                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'password']) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

<!--                            <div style="color:#999;margin:1em 0">-->
<!--                                If you forgot your password you can --><?//= Html::a('reset it', ['site/request-password-reset']) ?><!--.-->
<!--                            </div>-->

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>