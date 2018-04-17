<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumTransaksi */

$this->title = 'Update Web User Premium Transaksi: ' . $model->userPremiumTransaksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web User Premium Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userPremiumTransaksiID, 'url' => ['view', 'id' => $model->userPremiumTransaksiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-user-premium-transaksi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
