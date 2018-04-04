<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<!-- contact support -->
<div id="expertise" class="section p-t-60 bg--grey" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-bottom:100px;
    ">
    <div class="row">
        <div class="large-8 medium-12 small-12 large-centered column">
            <div class="el-content text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">Konfirmasi Lupa Password!</p>
                <h2 class="el-title">Silahkan Konfirmasi Alamat Email Anda Untuk Reset Password.</h2>
                <div class="divider"></div>
                <div class="clear"></div>
                <p class="m-t-30">Masukkan <b>email akun</b> yang akan direset password! Selanjutnya kami akan mengirimkan password baru kepada email tersebut
                    <br/>
                    <br/>
                    <?php if(isset($message)){
                        if($message == 'true'){
                            echo "<b>Password baru telah dikirim, silahkan cek email akun anda!</b>";
                        } else if($message == 'false') {
                            echo "<b>Maaf, akun tidak terdaftar</b>";
                        } else if($message == 'pending') {
                            echo "<b>Maaf, akun belum di konfirmasi, silahkan cek pesan konfirimasi yang telah kami kirimkan ke email akun anda</b>";
                        }
                    } ?>
                <?php $form = ActiveForm::begin(); ?>
                <div class="form-group">
                    <div class="col-lg-8">
                        <?= $form->field($model, 'email')->textInput(['type' => 'email','placeholder' => 'Email Akun Anda...'])->label(false) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <?= Html::submitButton('Kirim Password Recovery', ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>