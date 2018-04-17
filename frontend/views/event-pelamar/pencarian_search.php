<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 4/4/2018
 * Time: 8:04 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
    <?php $form = ActiveForm::begin([
        'action' => ['lowongan'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-12">
        <div class="col-lg-10">
            <?= $form->field($model, 'lowonganJurusan')->textInput(['placeholder' => 'Cari Lowongan Berdasarkan Jurusan...'])->label(false) ?>
        </div>
        <div class="col-lg-2">
            <?= Html::submitButton('<i class="fa fa-search"></i> Cari', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'lowonganLevelPekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganTipePekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganStatusPekerjaan') ?>

    <?php // echo $form->field($model, 'lowonganSyaratUmum') ?>

    <?php // echo $form->field($model, 'lowonganJenjangPendidikan') ?>

    <?php // echo $form->field($model, 'lowonganJurusan') ?>

    <?php // echo $form->field($model, 'lowonganIpkMinimal') ?>

    <?php // echo $form->field($model, 'lowonganSyaratKhusus') ?>

    <?php // echo $form->field($model, 'lowonganJobDesk') ?>

    <?php // echo $form->field($model, 'lowonganKeterangan') ?>

    <?php // echo $form->field($model, 'lowonganTglPost') ?>

    <?php // echo $form->field($model, 'lowonganValid') ?>

    <?php ActiveForm::end(); ?>
<!--    <form>-->
<!--        <div class="input-group">-->
<!--            <input type="text" class="form-control" placeholder="Cari Lowongan Berdasarkan Jurusan" style="height: 50px">-->
<!--            <div class="input-group-btn">-->
<!--                <button class="btn btn-success" type="submit" style="height: 50px; width: 50px">-->
<!--                    <i class="fa fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
</div>
