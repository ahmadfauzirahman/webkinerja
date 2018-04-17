<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\User\DashboardPengajuanLamaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Panggilan Tes";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-pengajuan-lamaran-index">

    <?php Pjax::begin(); ?>

    <h4 class="el-subtitle">Panggilan Tes</h4>
    Data panggilan tes (seleksi) dari lamaran kerja anda.
    </p>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'text-center',
        ],
        'itemView' => function($model,$key,$index,$widget){
            $lowongan = \frontend\models\Dashboard\DashboardLowongan::findOne($model->lamaranLowonganID);
            $perusahaan = \common\models\WebPerusahaan\WebPerusahaan::findOne($lowongan['lowonganPerusahaanID']);
            $l =  $lowongan['lowonganNama']."<br><small>".$perusahaan['perusahaanNama']."</small>";
            $s = '';
            $data = \frontend\models\Dashboard\DashboardSeleksi::find()->where(['seleksiLowonganID' => $model->lamaranLowonganID, 'seleksiStatus' => 'Aktif'])->orderBy(['seleksiTglAwal' => SORT_ASC])->all();
            ?>
            <div class="col-lg-12">
                <div class="card-article-hover card">
                    <div class="card-section" style="padding: 10px; padding-top: 20px; margin: 0; width:100%;">
                        <div class="col-lg-12">
                            <p class="article-desc">
                                <span class="pull-right">
                                    #<?= $lowongan['lowonganID'] ?>
                                </span>
                                <b><?= $l; ?></b>
                                <hr/>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Seleksi</th>
                                        <th>Waktu Mulai/Selesai</th>
                                        <th>Lokasi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($data AS $d){
                                        ?>
                                        <tr>
                                            <td>
                                                <b><?= $d->seleksiNama ?></b>
                                            </td>
                                            <td>
                                                <?= date('d F Y h:i:s',strtotime($d->seleksiTglAwal)) ?><hr/>
                                                <?=  date('d F Y h:i:s',strtotime($d->seleksiTglAkhir)) ?>
                                            </td>
                                            <td>
                                                <b><?= $d->seleksiTempat ?></b>
                                                <br>
                                                <?= $d->seleksiRuangan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td colspan="2">: <?= $d->seleksiKeterangan ?><br><br></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        },
        'pager' => [
            'firstPageLabel' => false,
            'lastPageLabel' => false,
            'prevPageLabel' => "<i class='fa fa-chevron-left'></i>",
            'nextPageLabel' => "<i class='fa fa-chevron-right'></i>",
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
