<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumTransaksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-user-premium-transaksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'userPremiumTransaksiID') ?>

    <?= $form->field($model, 'userPremiumID') ?>

    <?= $form->field($model, 'userID') ?>

    <?= $form->field($model, 'userPremiumTransaksiNama') ?>

    <?= $form->field($model, 'userPremiumTransaksiNoRek') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiTglTransaksi') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiTglKonfirmasi') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiNominal') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiBukti') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiKeterangan') ?>

    <?php // echo $form->field($model, 'userPremiumTransaksiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
