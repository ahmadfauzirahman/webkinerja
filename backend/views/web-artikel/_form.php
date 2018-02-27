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

<div class="web-artikel-form row">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'artikelUserID')->hiddenInput(['value' => Yii::$app->user->identity->userID])->label(false) ?>

    <div class="col-md-12">
    <?= $form->field($model, 'artikelJudul')->textInput(['placeholder' => 'Artikel Judul']) ?>
    </div>

    <div class="col-md-8">
    <?= $form->field($model, 'artikelIsi')->widget(Summernote::className(), [
        'clientOptions' => [
            'lang' => 'id'
        ]
    ]);
    ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'artikelKategoriID')->dropDownList(\yii\helpers\ArrayHelper::map(
        \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->all(),'kategoriArtikelID','kategoriArtikelNama'
    ),['prompt' => 'Silahkan pilih kategori...']) ?>

        <?php
        $data = isset($model->artikelThumbnails) ? [
            'pluginOptions' => [
                'initialPreview' => 'web/thumbnails/' . $model->artikelThumbnails,
                'initialPreviewAsData' => TRUE,
                'initialCaption' => "$model->artikelJudul",
            ],
        ] : [];
        ?>
        <?= $form->field($model, 'artikelThumbnails')->widget(\kartik\file\FileInput::className(), $data) ?>

    <!-- $form->field($model, 'artikelThumbnails')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [

            ]
        ])
    ?-->

    <?= $form->field($model, 'artikelTglPost')->hiddenInput(['value' => date('Y-m-d h:i:s')])->label(false) ?>

    <?= $form->field($model, 'artikeReader')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'artikelStatus')->dropDownList(['Publish' => 'Publish','Draf' => 'Draf']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
