<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebLowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-lowongan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'lowonganID') ?>

    <?= $form->field($model, 'lowonganPerusahaanID') ?>

    <?= $form->field($model, 'lowonganKategoriLowonganID') ?>

    <?= $form->field($model, 'lowonganNama') ?>

    <?= $form->field($model, 'lowonganFungsiPekerjaan') ?>

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

    <?php // echo $form->field($model, 'lowonganDaftarOnline') ?>

    <?php // echo $form->field($model, 'lowonganStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
