<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebUserPremiumTransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web User Premium Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-transaksi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Web User Premium Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'userPremiumTransaksiID',
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
            //'userPremiumTransaksiKeterangan:ntext',
            'userPremiumTransaksiStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
