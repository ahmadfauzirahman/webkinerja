<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebSetting */

$this->title = 'Create Web Setting';
$this->params['breadcrumbs'][] = ['label' => 'Web Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
