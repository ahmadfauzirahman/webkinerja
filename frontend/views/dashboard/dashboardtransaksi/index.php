<?php

use frontend\models\Dashboard\DashboardUserPremium;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Dashboard\DashboardUserPremiumTransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Transaksi Akun Premium";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<?php
$user = \frontend\models\User\User::findOne(Yii::$app->user->identity->userID);
if($user['role'] == 'perusahaan-premium') {
    $perusahaan = DashboardUserPremium::find()->where(['userID' => Yii::$app->user->identity->userID])->one();
    $end = date('Y-m-d h:i:s',strtotime('+7 days',strtotime($perusahaan['userPremiumAwal'])));
    if ($perusahaan['userPremiumStatus'] == 'Pending' && $end >= date('Y-m-d h:i:s')) {
        ?>
        <div class="alert alert-warning">
            <a href="<?= Yii::$app->urlManager->createUrl('dashboard-user-premium-transaksi/create') ?>" class="btn btn-success pull-right">Konfirmasi Sekarang</a>
            Tinggal <b><?= date_diff(date_create(date('Y-m-d h:i:s',strtotime('+7 days',strtotime($perusahaan['userPremiumAwal'])))),date_create())->d ?> HARI</b> lagi untuk melakukan aktifasi <b>Akun Premium</b> anda. Silahkan lakukan konfirmasi pembayaran untuk mengaktifkan fitur <b>Premium</b>
        </div>
    <?php } elseif ($perusahaan['userPremiumStatus'] == 'Konfirmasi Admin'){
        ?>
        <div class="alert alert-info">
            Terimakasih, konfirmasi <b>Akun Premium</b> anda telah kami terima. Kami akan memproses aktifasi akun Premium anda dalam 1-2 jam kerja.
        </div>
        <?php
    }
}
?>
<div class="dashboard-user-premium-transaksi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'userPremiumTransaksiNama:ntext',
            'userPremiumTransaksiNoRek:ntext',
            //'userPremiumTransaksiTglTransaksi',
            'userPremiumTransaksiTglKonfirmasi:datetime',
            [
                'attribute' => 'userPremiumTransaksiNominal',
                'value' => function($model){
                    return "Rp. ".number_format($model->userPremiumTransaksiNominal,'0',',','.').",-";
                }
            ],
            //'userPremiumTransaksiBukti:ntext',
            //'userPremiumTransaksiKeterangan:ntext',
            'userPremiumTransaksiStatus',

            ['class' => 'yii\grid\ActionColumn','visibleButtons' =>
                [
                    'delete' => false,
                    'update' => function($model){
                        if($model->userPremiumTransaksiStatus == 'Konfirmasi Admin'){
                            return true;
                        } else {
                            return false;
                        }
                    }
                ]
            ],
        ],
    ]); ?>
    </div>
</div>
