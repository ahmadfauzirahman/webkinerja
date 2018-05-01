<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebSeleksi */

$this->title = 'Update Web Seleksi: ' . $model->seleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seleksiID, 'url' => ['view', 'id' => $model->seleksiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-seleksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
