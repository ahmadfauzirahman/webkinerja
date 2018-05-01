<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebBerkasPelamar */

$this->title = 'Update Web Berkas Pelamar: ' . $model->berkasPelamarID;
$this->params['breadcrumbs'][] = ['label' => 'Web Berkas Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->berkasPelamarID, 'url' => ['view', 'id' => $model->berkasPelamarID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-berkas-pelamar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
