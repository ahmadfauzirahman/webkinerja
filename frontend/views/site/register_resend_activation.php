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
                <p class="el-subtitle">Kirim Ulang Aktivasi!</p>
                <h2 class="el-title">Silahkan Konfirmasi Kembali Alamat Email Anda.</h2>
                <div class="divider"></div>
                <div class="clear"></div>
                <p class="m-t-30">Masukkan <b>email akun</b> yang akan dikonfirmasi! Selanjutnya kami akan mengirimkan alamat konfirmasi kepada email tersebut
                    <br/>
                    <br/>
                    <?php if(isset($message)){
                        if($message == 'true'){
                            echo "<b>Konfirmasi telah dikirim, silahkan cek email akun anda!</b>";
                        } else if($message == 'false') {
                            echo "<b>Maaf, akun tidak terdaftar</b>";
                        } else if($message == "aktif") {
                            echo "<b>Maaf, akun sudah pernah dikonfirmasi, silahkan ke menu <a href='". Yii::$app->urlManager->createUrl(['site/forgot']) ."'><b>Lupa Password</b></a></b>";
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
                        <?= Html::submitButton('Kirim Aktivasi', ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>