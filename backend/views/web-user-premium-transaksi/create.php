<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumTransaksi */

$this->title = 'Create Web User Premium Transaksi';
$this->params['breadcrumbs'][] = ['label' => 'Web User Premium Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-transaksi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
