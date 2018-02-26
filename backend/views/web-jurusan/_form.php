<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebJurusan */
/* @var $form yii\widgets\ActiveForm */
use kartik\widgets\DepDrop;

?>

<div class="web-jurusan-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'jurusanUnivID')->widget(\kartik\select2\Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WebUniv::find()->all(),
            'univID', 'univNama'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Nama Fakultas .... ',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'jurusanNama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Jurusan']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
