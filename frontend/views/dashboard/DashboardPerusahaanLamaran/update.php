<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanLamaran */

$this->title = "Update Pelamar";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-pelamar']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view', 'id' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => 'List Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-lamaran', 'lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->lamaranID, 'url' => ['/dashboard-perusahaan-lamaran/view', 'id' => $model->lamaranID, 'lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-lamaran-update">

    <?= $this->render('_form', [
        'model' => $model,
        'lowongan' => $lowongan,
    ]) ?>

</div>
