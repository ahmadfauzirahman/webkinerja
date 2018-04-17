<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriSeleksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-kategori-seleksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'kategoriSeleksiID') ?>

    <?= $form->field($model, 'kategoriSeleksiNama') ?>

    <?= $form->field($model, 'kategoriSeleksiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
