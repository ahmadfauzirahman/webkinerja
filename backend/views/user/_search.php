<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'nama') ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'role')->dropDownList(
                [
                    'admin' => 'Admin'
                    , 'perusahaan' => 'Perusahaan',
                    'alumni' => 'Alumni'],['prompt'=>'Pilih']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-search"></i> Search'), ['class' => 'btn btn-primary']) ?>
        <a href="?r=user" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
