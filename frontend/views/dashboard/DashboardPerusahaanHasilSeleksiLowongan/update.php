<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan */

$this->title = "Update Hasil Seleksi";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Hasil Seleksi Pelamar Lowongan', 'url' => ['/dashboard-perusahaan-hasil-seleksi']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lowongan, 'url' => ['/dashboard-lowongan/view','id' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => 'List Hasil Seleksi', 'url' => ['/dashboard-perusahaan-hasil-seleksi-lowongan/index','lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->hasilSeleksiID, 'url' => ['/dashboard-perusahaan-hasil-seleksi-lowongan/view','id' => $model->hasilSeleksiID,'lowongan' => $lowongan]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-perusahaan-hasil-seleksi-lowongan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'lowongan' => $lowongan,
    ]) ?>

</div>
