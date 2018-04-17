<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardBerkasPelamar */

$this->title = "Update Data Berkas Pelamar";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Data Berkas Pelamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->berkasPelamarID, 'url' => ['view', 'id' => $model->berkasPelamarID]];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-berkas-pelamar-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
