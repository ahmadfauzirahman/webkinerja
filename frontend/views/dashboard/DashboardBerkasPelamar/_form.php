<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardBerkasPelamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-berkas-pelamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <span class="pull-right">
        <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index'], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?> <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span><h4 class="el-subtitle">Berkas Anda</h4>
    Berkas-berkas yang anda upload menjadi referensi tambahan bagi perusahaan.
    </p>
    <hr/>

    <div class="form-group">
        <label class="col-lg-4">Nama Berkas</label>
        <div class="col-lg-8">
    <?= $form->field($model, 'berkasPelamarNama')->textinput(['rows' => 6,'placeholder' => 'nama berkas'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4">File (.doc, .pdf, .jpg, .png)</label>
        <div class="col-lg-8">
            <?php
             if(isset($model->berkasPelamarFile)){
                 echo "File Sebelumnya (<b><a href='".Yii::$app->request->baseUrl."./../../frontend/web/berkaspelamar/".Yii::$app->user->identity->userID."/".$model->berkasPelamarFile."' target='_blank'>".$model->berkasPelamarFile."</a></b>)";
             }
            ?>
    <?php
    $data = isset($model->berkasPelamarFile) ? [
        'options' => [
            'multiple' => FALSE,
        ],
        'pluginOptions' => [
            'initialPreviewShowDelete' => FALSE,
            //'initialPreview' => Yii::$app->request->baseUrl.'./../../frontend/web/berkaspelamar/'.Yii::$app->user->identity->userID.'/'. $model->berkasPelamarFile,
            'initialPreviewAsData' => TRUE,
            'initialCaption' => FALSE,
            'showUpload' => FALSE,
            'showCancel' => FALSE,
            'showRemove' => FALSE,
        ],
    ] : [];
    ?>
    <?= $form->field($model, 'berkasPelamarFile')->
    widget(\kartik\file\FileInput::className(), $data ,['value'=> $model->berkasPelamarFile])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-4"><label>Permission</label></div>
        <div class="col-lg-8">
            <small><i>mode <b>Publik</b> izinkan file untuk dilihat perusahaan</i></small>
    <?= $form->field($model, 'berkasPelamarStatus')->radioList(['1' => 'Publik ','0' => 'Private '])->label(false) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
