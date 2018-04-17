<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-user-premium-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'userPremiumID') ?>

    <?= $form->field($model, 'userID') ?>

    <?= $form->field($model, 'userPremiumAwal') ?>

    <?= $form->field($model, 'userPremiumAkhir') ?>

    <?= $form->field($model, 'userPremiumKeterangan') ?>

    <?php // echo $form->field($model, 'userPremiumStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
