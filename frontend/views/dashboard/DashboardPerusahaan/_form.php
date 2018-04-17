<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-perusahaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <div class="col-md-12">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success pull-right']) ?>
        <p>
            Silahkan lengkapi data perusahaan anda pada form dibawah ini.
        </p>
        </div>
        <div class="clear"></div>
    </div>

<div class="panel panel-default">
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Profil Perusahaan</a>
            </li>
            <li class=""><a href="#address" data-toggle="tab" aria-expanded="false">Alamat Perusahaan</a>
            </li>
            <li class=""><a href="#officer" data-toggle="tab" aria-expanded="false">Officer</a>
            </li>
            <li class=""><a href="#logo" data-toggle="tab" aria-expanded="false">Logo Perusahaan</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="profile">

                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <div class="form-group">
                            <div class="col-lg-12">
                        <h4 class="el-subtitle">Data Profil Perusahaan</h4>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>
                        <div class="form-group">
                            <label class="col-lg-4">Nama Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanNama')->textInput(['rows' => 6,'placeholder' => 'nama perusahaan'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Jenis Industri</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanJnsIndustriID')->widget(\kartik\select2\Select2::className(), [
                            'data' => \yii\helpers\ArrayHelper::map(\common\models\WebJnsIndustri::find()->where(['jnsIndustriStatus' => 'Aktif'])->all(),
                                'jnsIndustriID', 'jnsIndustriNama'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Pilih Jenis Industri...',],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4">Email Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanEmail')->textInput(['maxlength' => true,'placeholder' => 'email perusahaan'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Link Situs Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanLink')->textInput(['rows' => 6,'placeholder' => 'www.company-site.com'])->label(false) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4">No. Telepon Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanTelfon')->textInput(['maxlength' => true,'placeholder' => 'no. telepon perusahaan'])->label(false) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4">Profil Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanProfil')->textarea(['rows' => 6,'placeholder' => 'profil perusahaan'])->label(false) ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="address">

                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h4 class="el-subtitle">Data Alamat Perusahaan</h4>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>

                        <div class="form-group">
                            <label class="col-lg-4">Negara</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanNegaraID')->textInput(['maxlength' => true,'placeholder' => 'negara'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Provinsi</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanProvinsiID')->widget(\kartik\select2\Select2::className(), [
                            'data' => \yii\helpers\ArrayHelper::map(\common\models\WebProvinsi::find()->all(), 'provinsiID', 'provinsiNama'),
                            'language' => 'en',
                            'options' => [
                                'placeholder' => 'Pilih Provinsi...',
                                'onchange' => '$.post("index.php?r=dashboard-perusahaan/provinsi&id='.'"+$(this).val(), function(data) {
                $("select#dashboardperusahaan-perusahaankotaid").html(data);
                });'
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Kota/Kabupaten</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanKotaID')->widget(\kartik\select2\Select2::className(), [
                            'data' => \yii\helpers\ArrayHelper::map(\common\models\WebKota::find()->where(['kotaProvinsiID' => $model->perusahaanProvinsiID])->orderBy(['kotaNama' => SORT_ASC])->all(),
                                'kotaID', 'kotaNama'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Pilih Kota...',],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Kode Pos</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanKodePos')->textInput(['maxlength' => true,'placeholder' => 'kode pos'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Alamat Perusahaan</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanAlamat')->textarea(['rows' => 6,'placeholder' => 'alamat perusahaan'])->label(false) ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="officer">

                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h4 class="el-subtitle">Data Officer</h4>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>

                        <div class="form-group">
                            <label class="col-lg-4">Nama Officer</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanNamaOfficer')->textInput(['maxlength' => true,'placeholder' => 'nama officer'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Email Officer</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanEmailOfficer')->textInput(['maxlength' => true,'placeholder' => 'email officer'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">No. Telepon Officer</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahaanTelfonOfficer')->textInput(['maxlength' => true,'placeholder' => 'no. telepon officer'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">No. Handphone Officer</label>
                            <div class="col-lg-8">
                        <?= $form->field($model, 'perusahanHpOfficer')->textInput(['maxlength' => true,'placeholder' => 'no. handphone officer'])->label(false) ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade active in" id="logo">

                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h4 class="el-subtitle">Data Logo Perusahaan</h4>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>
                        <div class="form-group">
                            <label class="col-lg-4">Logo Perusahaan</label>
                            <div class="col-lg-8">

                                <?php
                                $data = isset($model->perusahaanFoto) ? [
                                    'options' => [
                                        'multiple' => FALSE,
                                    ],
                                    'pluginOptions' => [
                                        'initialPreviewShowDelete' => FALSE,
                                        'initialPreview' => Yii::$app->request->baseUrl.'./../../backend/web/logoperusahaan/'. $model->perusahaanFoto,
                                        'initialPreviewAsData' => TRUE,
                                        'initialCaption' => FALSE,
                                        'showUpload' => FALSE,
                                        'showCancel' => FALSE,
                                        'showRemove' => FALSE,
                                    ],
                                ] : [];
                                ?>
                                <?= $form->field($model, 'perusahaanFoto')->
                                widget(\kartik\file\FileInput::className(), $data ,['value'=> $model->perusahaanFoto])->label(false) ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
