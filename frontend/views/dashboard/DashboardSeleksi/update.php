<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardSeleksi */

$lID = $lowongan;

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Lowongan', 'url' => ['/dashboard-lowongan']];
$this->params['breadcrumbs'][] = ['label' => '#'.$lID, 'url' => ['/dashboard-lowongan/view', 'id'=>$lID]];
$this->params['breadcrumbs'][] = ['label' => 'List Seleksi', 'url' => ['/dashboard-seleksi/index', 'lowongan'=>$lID]];
$this->params['breadcrumbs'][] = ['label' => "#".$model->seleksiID, 'url' => ['/dashboard-seleksi/view', 'lowongan'=>$lID, 'id' => $model->seleksiID]];
$this->params['breadcrumbs'][] = ['label' => "Update List Seleksi"];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-seleksi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'lowongan' => $lowongan,
    ]) ?>

</div>
