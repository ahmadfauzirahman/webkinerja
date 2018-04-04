<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 11/03/2018
 * Time: 15.26
 */
use frontend\models\Dashboard\DashboardUser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = "Profile";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

$model = DashboardUser::findOne(Yii::$app->user->identity->userID);
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="user-form row">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-7">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Masukan Email']) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Masukan Password']) ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukan Nama Lengkap']) ?>
    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true,'placeholder'=>'Masukan Nomor Hp']) ?>
    <?php
    $data = isset($model->foto) ? [
        'options' => [
            'multiple' => FALSE,
        ],
        'pluginOptions' => [
            'initialPreviewShowDelete' => FALSE,
            'initialPreview' => '../../backend/web/foto/'. $model->foto,
            'initialPreviewAsData' => TRUE,
            'initialCaption' => FALSE,
            'showUpload' => FALSE,
            'showCancel' => FALSE,
            'showRemove' => FALSE,
        ],
    ] : [];
    ?>
</div>
<div class="col-md-5">
    <?= $form->field($model, 'foto')->
    widget(\kartik\file\FileInput::className(), $data ,['value'=> $model->foto]) ?>
    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success btn-block btn-lg']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

</div>