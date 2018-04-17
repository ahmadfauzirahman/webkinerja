<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardPengajuanLamaran */

$this->title = 'Create Dashboard Pengajuan Lamaran';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard Pengajuan Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-pengajuan-lamaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
