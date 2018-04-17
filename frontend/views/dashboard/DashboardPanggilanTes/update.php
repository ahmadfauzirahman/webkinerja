<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardPengajuanLamaran */

$this->title = 'Update Dashboard Pengajuan Lamaran: ' . $model->lamaranID;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard Pengajuan Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lamaranID, 'url' => ['view', 'id' => $model->lamaranID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dashboard-pengajuan-lamaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
