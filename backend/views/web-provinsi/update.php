<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebProvinsi */

$this->title = 'Update Web Provinsi: ' . $model->provinsiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Provinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->provinsiID, 'url' => ['view', 'id' => $model->provinsiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-provinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
