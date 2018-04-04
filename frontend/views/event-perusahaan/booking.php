<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:23 PM
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<br><br>
<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:50px;padding-bottom: 20px;
    ">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <h2 class="el-title">Platinum</h2>
        <p class="el-subtitle">No booth 20</p>
        <div class="divider float-left"></div>
    </div>
</div>
<div class="section" style="padding: 50px">
    <div class="row text-center">
        <ul class="nav nav-tabs nav-justified">
            <li class="<?php if(isset($this->params['active_form'])){ echo $this->params['active_form'];}?>">
                <a href="#">Form Booking</a></li>
            <li class="<?php if(isset($this->params['active_fasilitas'])){ echo $this->params['active_fasilitas'];}?>">
                <a href="#">Fasilitas</a></li>
        </ul>
        <h2 class="el-title">Form Booking Stand</h2>
        <div class="divider"></div>
        <br>
        <?= $this->render('_form-booking', [
            'model' => $model,
            'id' => $event->eventsID,
            'id_stand' => $stand->standsID
        ]) ?>
    </div>
</div>

<?php

$script = <<< JS
    jQuery.noConflict();

JS;
$this->registerJs($script);
?>
