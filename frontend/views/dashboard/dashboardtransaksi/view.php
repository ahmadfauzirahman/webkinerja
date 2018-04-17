<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardUserPremiumTransaksi */

$this->title = $model->userPremiumTransaksiID;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Akun Premium', 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-user-premium-transaksi-view">

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-default']) ?>
            <?php if($model->userPremiumTransaksiStatus == 'Konfirmasi Admin'){ ?>
            <?= Html::a('Update <i class="fa fa-save"></i>', ['update', 'id' => $model->userPremiumTransaksiID], ['class' => 'btn btn-success']) ?>
            <?php } ?>
        </span>
        <h2>Detail Transaksi</h2>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userPremiumTransaksiID',
            'userPremiumTransaksiNama:ntext',
            'userPremiumTransaksiNoRek:ntext',
            'userPremiumTransaksiTglTransaksi',
            'userPremiumTransaksiTglKonfirmasi:datetime',
            //'userPremiumTransaksiNominal:ntext',
            [
                'attribute' => 'userPremiumTransaksiNominal',
                'value' => function($model){
                    return "Rp. ".number_format($model->userPremiumTransaksiNominal,'0',',','.').",-";
                }
            ],
            //'userPremiumTransaksiBukti:ntext',
            [
                'label' => 'Bukti Transfer',
                'format' => 'raw',
                'value' => '<a type="button" class="btn btn-default" href="../../backend/web/buktitransfer/'.$model->userPremiumTransaksiBukti . '" target="_blank"><img src="../../backend/web/buktitransfer/'.$model->userPremiumTransaksiBukti . '" width="60px" height="40px"/></a>',
            ],
            'userPremiumTransaksiKeterangan:ntext',
            'userPremiumTransaksiStatus',
        ],
    ]) ?>

</div>
