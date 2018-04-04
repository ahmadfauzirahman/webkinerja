<?php
use frontend\models\Dashboard\DashboardUserPremium;
use yii\widgets\Breadcrumbs;

$this->title = "Dashboard";
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
<?php

    $company = \frontend\models\Dashboard\DashboardPerusahaan::find()->where(['perusahaanUserID' => Yii::$app->user->identity->userID])->one();

?>

<div class="col-lg-2 col-md-6 center">
    <br/>
    <?php if(Yii::$app->user->identity->foto == ''){ ?>
        <img class="" style="border:1px solid #dddddd; float: left; width: 90px; height: 90px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/thumbs.png" alt="avatar">
    <?php } else { ?>
        <img class="" style="border:1px solid #dddddd; float: left; width: 90px; height: 90px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/logoperusahaan/<?= $company->perusahaanFoto; ?>" alt="avatar">
    <?php } ?>
</div>
<div class="col-lg-10 col-md-6">
    <h3><?= $company->perusahaanNama ?> <br><small><b><?= $company->perusahaanNegaraID ?></b> ( <?= \common\models\WebKota::findOne($company->perusahaanKotaID)['kotaNama'] ?> - <?= \common\models\WebProvinsi::findOne($company->perusahaanProvinsiID)['provinsiNama'] ?> )</small></h3>
    <p><?= $company->perusahaanProfil ?></p>
</div>
<div class="clear"></div>
<hr/>
<div class="col-lg-4 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-briefcase fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-weight: bolder; font-size: 22px;">26</span>
                    <div>Lowongan Anda</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-send fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-weight: bolder; font-size: 22px;">5</span>
                    <div>Artikel Anda</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-weight: bolder; font-size: 22px;">221</span>
                    <div>Calon Pelamar</div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
