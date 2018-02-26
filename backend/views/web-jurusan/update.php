<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebJurusan */

$this->title = 'Update Web Jurusan: ' . $model->jurusanID;
$this->params['breadcrumbs'][] = ['label' => 'Web Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jurusanID, 'url' => ['view', 'id' => $model->jurusanID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-jurusan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
