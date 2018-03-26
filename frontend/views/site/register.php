<?php

/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<!-- contact support -->
<div class="section  p-b-60 p-t-60" id="developer" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png') no-repeat; box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-8 column">
            <div class="section-header animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-content text-left  animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <p class="el-subtitle">REGISTER</p>
                    <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd;">Daftarkan diri anda sekarang juga!</h2>
                    <div class="divider float-left"></div>
                    <div class="clear"></div>
                    <p class="m-t-30">Daftar sekarang dan jadilah bagian dari kami.
                    </p>
                </div>
            </div>
        </div>
        <div class="large-4 column">
            <div class="section-header animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <div class="el-content text-center animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <div class="clear"></div>
                    <p class="m-t-30">
                        <br/>
                        <br/>
                        <br/>
                        <a href="<?= \common\models\WebSetting::findOne(1)['settingPageGuide'] ?>" target="_blank" class="btn btn-lg btn-block btn-warning">Pelajari lebih lanjut</a>
                    </p>
                </div>
            </div>
        </div>
    <div class="clear"></div>
    <br>
    </div>
</div>
<div class="section  p-b-60 p-t-60">
    <div class="row">
        <div class="large-12 large-centered column">
            <div class="section-header animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">

                <div class="user-form">

                    <?= $this->render('register_form_two', [
                        'model' => $model,
                        'model2' => $model2,
                    ]) ?>

                </div>

            </div>
        </div>
        <div class="clear"></div>
        <br>
    </div>
</div>