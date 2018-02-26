<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */

$this->title = 'Tambah Nama Universitas';
$this->params['breadcrumbs'][] = ['label' => 'Nama Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-univ-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
