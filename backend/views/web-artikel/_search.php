<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-artikel-search row">

    <div class="col-md-12">

    </div>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'artikelID') ?>

    <?= $form->field($model, 'artikelKategoriID')->dropDownList(\yii\helpers\ArrayHelper::map(
        \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->all(),'kategoriArtikelID','kategoriArtikelNama'
    ),['prompt' => 'Filter...']) ?>

    <?= $form->field($model, 'artikelUserID') ?>

    <?= $form->field($model, 'artikelJudul') ?>

    <?= $form->field($model, 'artikelIsi') ?>

    <?php // echo $form->field($model, 'artikelThumbnails') ?>

    <?php // echo $form->field($model, 'artikelTglPost') ?>

    <?php // echo $form->field($model, 'artikeReader') ?>

    <?php // echo $form->field($model, 'artikelStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
