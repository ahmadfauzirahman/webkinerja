<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-perusahaan-hasil-seleksi-lowongan-search panel panel-body panel-default">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-lg-12">
                    <p>
                        Cari berdasarkan:
                    </p>
                </div>
            </div>
        </div>

        <?php $form = ActiveForm::begin([
            'action' => ['index','lowongan' => $lowongan],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-6">
            <div class="form-group">
                <div class="col-lg-12">
                    <?= $form->field($model, 'hasilSeleksiLamaranID')->widget(\kartik\select2\Select2::className(), [
                        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan::find()->where(['hasilSeleksiLowonganID' => $lowongan])->all(),
                            'hasilSeleksiLamaranID', 'hasilSeleksiUserID'),
                        'language' => 'en',
                        'options' => ['placeholder' => 'pilih pelamar...',],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false) ?>
                </div>
            </div>
        </div>

    <?php //= $form->field($model, 'hasilSeleksiID') ?>

    <?php //= $form->field($model, 'hasilSeleksiUserID') ?>

    <?php //= $form->field($model, 'hasilSeleksiLamaranID') ?>

    <?php //= $form->field($model, 'hasilSeleksiHasil') ?>

    <?php //= $form->field($model, 'hasilSeleksiKeterangan') ?>

        <div class="col-md-6">
            <div class="form-group">
                <div class="col-lg-12">
                    <?= $form->field($model, 'hasilSeleksiStatus')->dropDownList(['Lulus' => 'Lulus', 'Tidak Lulus' => 'Tidak Lulus','Pending' => 'Pending'],['prompt' => 'pilih status hasil seleksi...'])->label(false) ?>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="pull-right">
                        <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-warning']) ?>
                        <?= Html::resetButton('<i class="fa fa-eraser"></i> Reset', ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
