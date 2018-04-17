<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardSeleksi */
/* @var $form yii\widgets\ActiveForm */

$lID = $lowongan;
?>

<div class="dashboard-seleksi-form">


    <?php $form = ActiveForm::begin(); ?>
    
    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index','lowongan' => $lID], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?> <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span>
    <h4 class="el-subtitle">Seleksi ( <b><?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?></b> )</h4>
    Anda bisa membuat daftar seleksi untuk lowongan pekerjaan <?= \frontend\models\Dashboard\DashboardLowongan::findOne($lID)['lowonganNama'] ?>.
    </p>
    <hr/>

    <div class="form-group">
        <label class="col-lg-4">Judul Seleksi</label>
        <div class="col-lg-8">
            <?= $form->field($model, 'seleksiNama')->textInput(['rows' => 6,'placeholder' => 'judul seleksi'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Kategori Seleksi</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiKategoriSeleksiID')->widget(\kartik\select2\Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WebKategoriSeleksi::find()->where(['kategoriSeleksiStatus' => 'Aktif'])->all(),
            'kategoriSeleksiID', 'kategoriSeleksiNama'),
        'language' => 'en',
        'options' => ['placeholder' => 'pilih kategori seleksi...',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Tgl. Awal Seleksi</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiTglAwal')->widget(\kartik\widgets\DateTimePicker::className(),[
        'options' => [
            'placeholer' => "masukkan tgl. awal..."
        ],
        'value' => date('Y-m-d h:i:s'),
        'pluginOptions' => [
            'autoclose' => TRUE,
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayHighlight' => TRUE,
        ],
    ])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Tgl. Akhir Seleksi</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiTglAkhir')->widget(\kartik\widgets\DateTimePicker::className(),[
        'options' => [
            'placeholer' => "masukkan tgl. akhir..."
        ],
        'value' => date('Y-m-d h:i:s'),
        'pluginOptions' => [
            'autoclose' => TRUE,
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayHighlight' => TRUE,
        ],
    ])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Lokasi Seleksi</label>
        <div class="col-lg-8">
            <?= $form->field($model, 'seleksiLokasi')->radioList([0 => 'UIN SUSKA RIAU', 1 => 'Lainnya'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <div class="alert alert-info"><small>Untuk lokasi seleksi <span class="text-red">UIN SUSKA RIAU</span> dikenakan biaya administrasi dan penyewaan tempat. <a href="<?= \common\models\WebSetting::findOne(1)['settingPageGuide'] ?>" target="_blank">Pelajari lebih lanjut</a> tentang Lokasi Seleksi</small></div>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Tempat Seleksi</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiTempat')->textInput(['rows' => 6,'placeholder' => 'tempat seleksi'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Ruang Seleksi</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiRuangan')->textInput(['rows' => 6,'placeholder' => 'ruangan seleksi'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Keterangan Lainnya</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiKeterangan')->textarea(['rows' => 6,'placeholder' => 'keterangan lainnya...'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">Status</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'seleksiStatus')->dropDownList(['Aktif' => 'Aktif','Non Aktif' => 'Non Aktif'])->label(false) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
