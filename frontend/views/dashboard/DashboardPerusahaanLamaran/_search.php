<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanLamaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-perusahaan-lamaran-search panel panel-body panel-default">

    <div class="row">

        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                        <p>
                            Cari berdasarkan:
                        </p>
                </div>
            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-12">
            <div class="col-md-3">
                <div class="form-group">
            <?= $form->field($model, 'lamaranID')->textInput(['placeholder' => 'ID Lamaran']) ?>
                </div>
            </div>

        <!--    --><?php //= $form->field($model, 'lamaranUserID') ?>

            <?php //= $form->field($model, 'lamaranLowonganID') ?>

            <?php //= $form->field($model, 'lamaranPermohonan') ?>

            <div class="col-md-5">
                <div class="form-group">
            <?= $form->field($model, 'lamaranTglMelamar')->widget(\kartik\widgets\DateTimePicker::className(),[
                'options' => [
                    'placeholer' => "masukkan tgl. melamar..."
                ],
                'value' => date('Y-m-d h:i:s'),
                'pluginOptions' => [
                    'autoclose' => TRUE,
                    'format' => 'yyyy-mm-dd hh:ii:ss',
                    'todayHighlight' => TRUE,
                ],
            ]) ?>
                </div>
            </div>

            <?php // echo $form->field($model, 'lamaranKeteranganLamaran') ?>

            <div class="col-md-4">
                <div class="form-group">
            <?php echo $form->field($model, 'lamaranStatus')->dropDownList(['Pending Review' => 'Pending Review', 'Diterima' => 'Diterima', 'Ditolak' => 'Ditolak'],['prompt' => 'Pilih Status...']) ?>
                </div>
            </div>
        </div>

        <?php // echo $form->field($model, 'lamaranRekomendasi') ?>

        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="form-group">
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
