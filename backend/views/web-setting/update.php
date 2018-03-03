<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebSetting */

$this->title = 'Update Web Setting: ' . $model->settingID;
$this->params['breadcrumbs'][] = ['label' => 'Web Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->settingID, 'url' => ['view', 'id' => $model->settingID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-setting-update">

<!--    <h1><?php //= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
