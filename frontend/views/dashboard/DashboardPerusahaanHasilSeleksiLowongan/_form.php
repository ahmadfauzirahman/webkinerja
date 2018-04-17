<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-perusahaan-hasil-seleksi-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index','lowongan' => $lowongan], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?>
            <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span>
    <h4 class="el-subtitle">    <small>Hasil Seleksi Pelamar Lowongan</small><br><b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lowongan)['lowonganNama'] ?></b></h4>
    Daftar hasil seleksi calon pelamar pekerjaan pada lowongan yang anda publish.
    <hr/>

    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-lg-6">
                ID Pelamar
            </label>
            <div class="col-lg-6">
                <?= $form->field($model, 'hasilSeleksiLamaranID')->widget(\kartik\select2\Select2::className(), [
                    'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Dashboard\DashboardPerusahaanLamaran::find()->where("NOT EXISTS (SELECT * FROM web_hasil_seleksi WHERE web_hasil_seleksi.hasilSeleksiLamaranID = web_lamaran.lamaranID) OR lamaranID = '".$model->hasilSeleksiLamaranID."'")->andWhere(['lamaranLowonganID' => $lowongan,'lamaranStatus' => 'Diterima'])->all(),
                        'lamaranID', 'lamaranUserID'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'pilih pelamar...',],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
        </div>
    </div>
    <hr/>
    <?php

    if(!$model->isNewRecord) {
        $checkedList = $model->hasilSeleksiHasil; //get selected value from db if value exist
        $model->hasilSeleksiHasil = $checkedList;
    } else {
        $checkedList = [];
    }

        $data = \frontend\models\Dashboard\DashboardSeleksi::find()->where(['seleksiLowonganID' => $lowongan, 'seleksiStatus' => 'Aktif'])->all();
        foreach($data AS $d){
            $value = '';
            if($checkedList != null) {
                foreach ($checkedList AS $c => $dd) {
                    if ($c == $d['seleksiID']) {
                        $value = $dd; //get selected value from db if value exist
                    }
                }
            } ?>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="col-lg-6">
                        <?= $d->seleksiNama ?>
                    </label>
                    <div class="col-lg-6">
                        <input name="DashboardPerusahaanHasilSeleksiLowongan[hasilSeleksiHasil][<?= $d->seleksiID ?>]" class="form-control" value="<?= $value; ?>" placeholder="Penilaian <?= $d->seleksiNama ?>..."/>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <br>
            <?php
        }

    ?>
    <hr/>
    <?php //= $form->field($model, 'hasilSeleksiHasil')->textarea(['rows' => 6]) ?>

    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-lg-6">
                Keterangan
            </label>
            <div class="col-lg-6">
    <?= $form->field($model, 'hasilSeleksiKeterangan')->textarea(['rows' => 6])->label(false) ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-lg-6">
                Status Hasil Seleksi
            </label>
            <div class="col-lg-6">
    <?= $form->field($model, 'hasilSeleksiStatus')->dropDownList(['Lulus' => 'Lulus', 'Tidak Lulus' => 'Tidak Lulus','Pending' => 'Pending'],['prompt' => 'pilih status hasil seleksi...'])->label(false) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
