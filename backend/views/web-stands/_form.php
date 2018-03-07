<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\WebStands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-stands-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'standsVenueID')->widget(Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\WebVenue::find()->all(),'venueID','venueNama'),
        'language' => 'en',
        'options' => ['placeholder'=>'Pilih Venue ...'],
        'pluginOptions' => [
                'allowClear' => true
        ]
    ]) ?>

    <?= $form->field($model, 'standsEventsID')->hiddenInput(['value'=>$id])->label(false) ?>

    <?= $form->field($model, 'standsNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'standsKategoriStandID')->widget(Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WebKategoriStand::find()->all(),'kategoriStandID','kategoriStandNama'),
        'language' => 'en',
        'options' => ['placeholder'=>'Pilih Kategori ...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= $form->field($model, 'standsPerusahaanID')->textInput() ?>

    <?= $form->field($model, 'standsStatus')->dropDownList(['kosong'=>'Kosong', 'terisi'=>'Terisi']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
