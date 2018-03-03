<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebDokumentasi */

$this->title = 'Update Web Dokumentasi: ' . $model->dokumentasiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Dokumentasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dokumentasiID, 'url' => ['view', 'id' => $model->dokumentasiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-dokumentasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
