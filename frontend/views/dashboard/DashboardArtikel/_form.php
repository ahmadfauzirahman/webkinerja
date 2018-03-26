<?php

use kartik\widgets\FileInput;
use marqu3s\summernote\Summernote;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikel */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/ckeditor.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample.js"></script>


<div class="web-artikel-form">


    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>


    <p>
        <span class="pull-right">
        <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index'], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?> <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span>
        <h4 class="el-subtitle">Artikel Anda</h4>
    Anda bisa menulis artikel untuk diterbitkan ke publik
    </p>
    <hr/>
    <div class="col-md-7">
        <div class="form-group">
        <?= $form->field($model, 'artikelJudul')->textInput(['placeholder' => 'Artikel Judul'])->label('Judul Artikel') ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'artikelKategoriID')->dropDownList(\yii\helpers\ArrayHelper::map(
                \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->all(),'kategoriArtikelID','kategoriArtikelNama'
            ),['prompt' => 'Silahkan pilih kategori...'])->label('Pilih Kategori:') ?>
        </div>
        <div class="form-group">
            <h3><label>Author:</label><br/><?= Yii::$app->user->identity->nama ?></h3>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
        <?php
        $data = isset($model->artikelThumbnails) ? [
            'pluginOptions' => [
                'initialPreview' => Yii::$app->request->baseUrl.'./../../backend/web/thumbnails/' . $model->artikelThumbnails,
                'initialPreviewAsData' => TRUE,
                'initialCaption' => FALSE,
                'showUpload' => FALSE,
                'showCancel' => FALSE,
                'showRemove' => FALSE,
                'showZoom' => FALSE,
            ],
        ] : [];
        ?>
        <?= $form->field($model, 'artikelThumbnails')->widget(\kartik\file\FileInput::className(), $data) ?>
        </div>
    </div>

        <div class="col-md-12">
            <div class="form-group">
            <?= $form->field($model, 'artikelIsi')->textarea(['id' => 'editor']) ?>
            </div>
        </div>

        </div>

        <?php ActiveForm::end(); ?>

</div>
<script>
    initSample();
</script>