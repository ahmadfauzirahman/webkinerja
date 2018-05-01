<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebPelamar */

$this->title = 'Update Web Pelamar: ' . $model->pelamarID;
$this->params['breadcrumbs'][] = ['label' => 'Web Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pelamarID, 'url' => ['view', 'id' => $model->pelamarID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-pelamar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
