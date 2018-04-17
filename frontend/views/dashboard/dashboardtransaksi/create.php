<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardUserPremiumTransaksi */

$this->title = "Transaksi Akun Premium";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-user-premium-transaksi-create">

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index'], ['class' => 'btn btn-default']) ?>
        </span>
    <h2>Konfirmasi Transaksi</h2>
    <hr/>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
