<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremiumTransaksi */

$this->title = $model->userPremiumTransaksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web User Premium Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-transaksi-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userPremiumTransaksiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userPremiumTransaksiID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userPremiumTransaksiID',
            'userPremiumID',
            'userID',
            'userPremiumTransaksiNama:ntext',
            'userPremiumTransaksiNoRek:ntext',
            'userPremiumTransaksiTglTransaksi',
            'userPremiumTransaksiTglKonfirmasi',
            //'userPremiumTransaksiNominal:ntext',
            [
                'attribute' => 'userPremiumTransaksiNominal',
                'value' => function($model){
                    return "Rp. ".number_format($model->userPremiumTransaksiNominal,'0',',','.').",-";
                }
            ],
            //'userPremiumTransaksiBukti:ntext',
            [
                'attribute' => 'userPremiumTransaksiBukti',
                'format' => 'raw',
                'value' => function($model){
                    return '<a class="btn btn-lg" href="'.Yii::$app->request->baseUrl.'/buktitransfer/'.$model->userPremiumTransaksiBukti.'" target="_blank"><img src="'.Yii::$app->request->baseUrl.'/buktitransfer/'.$model->userPremiumTransaksiBukti.'" width="80px" height="auto"/></a>';
                }
            ],
            'userPremiumTransaksiKeterangan:ntext',
            'userPremiumTransaksiStatus',
        ],
    ]) ?>

</div>
