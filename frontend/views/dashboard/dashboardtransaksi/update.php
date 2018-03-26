<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardUserPremiumTransaksi */

$this->params['breadcrumbs'][] = ['label' => 'Dashboard User Premium Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->userPremiumTransaksiID, 'url' => ['view', 'id' => $model->userPremiumTransaksiID]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-user-premium-transaksi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
