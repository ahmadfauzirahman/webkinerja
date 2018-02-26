<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebKota */

$this->title = 'Update Web Kota: ' . $model->kotaID;
$this->params['breadcrumbs'][] = ['label' => 'Web Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kotaID, 'url' => ['view', 'id' => $model->kotaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-kota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
