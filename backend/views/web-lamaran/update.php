<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebLamaran */

$this->title = 'Update Web Lamaran: ' . $model->lamaranID;
$this->params['breadcrumbs'][] = ['label' => 'Web Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lamaranID, 'url' => ['view', 'id' => $model->lamaranID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-lamaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
