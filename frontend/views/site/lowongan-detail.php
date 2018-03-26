<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;

//$this->title = 'My Yii Application';
?>
<br>
<br>
<?php
$dP = \common\models\WebPerusahaan\WebPerusahaan::find()->where(['perusahaanID' => $model->lowonganPerusahaanID])->one();
$status = \frontend\models\Dashboard\DashboardUserPremium::find()->where(['userID' => $dP->perusahaanUserID])->one()['userPremiumStatus'];
?>
<div class="section p-t-30 p-b-30 bg--grey" id="about" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png'); box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 small-12 column">
            <div class="el-content animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <br>
                <img style="margin-right: 15px; border: 5px solid #efefef; float: left; width: 120px; height: 120px;" src="<?= Yii::$app->request->baseUrl ?>./../../backend/web/logoperusahaan/<?= $dP->perusahaanFoto ?>" alt="thumbs">
                <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd; margin-bottom: 0"><?= $dP['perusahaanNama'] ?></h2>
                <p class="small" style="color: #999999;">
                    <?php
                    if($status == 'Aktif'){ echo '<span class="badge badge-success"><i class="fa fa-star" style="color: yellow;"></i> <b>Premium Company</b> </span>'; }
                    ?>
                     &nbsp;<i class="fa fa-envelope-o"></i> <?= $dP['perusahaanEmail'] ?> | <i class="fa fa-phone"></i> <?= $dP['perusahaanTelfon'] ?> | <i class="fa fa-building"></i> <?= \common\models\WebJnsIndustri::findOne($dP['perusahaanJnsIndustriID'])['jnsIndustriNama']; ?>
                    <?php $dK = \common\models\WebKota::find()->where(['kotaID' => $dP['perusahaanKotaID']])->one() ?>
                </p>
                <p>
                    <?= $dK['kotaNama'] ?> - <?= $dP['perusahaanNegaraID'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="section p-t-30 p-b-60 bg--grey" id="blog" style="background:#ffffff url('images/ppc/ppc_section-bg-01.png') repeat;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
    <div class="row">
        <div class="large-3 column">
            <p class="el-subtitle text-bluedark">Kategori Lowongan</p>
            <div class="divider float-left"></div>
            <div class="clear"></div>
            <p class="m-t-30">
                <?php

                $kL = ['1'=>'Lowongan Kerja','2' => 'Lowongan Magang'];
                foreach($kL AS $klk => $klv){
                    echo '<a href="'.Yii::$app->urlManager->createUrl(['site/lowongan', 'LowonganSearch' => ['lowonganKategoriLowonganID' => $klk]]).'">'.$klv.'</a><br><hr/>';
                }
                echo '<a href="' . Yii::$app->urlManager->createUrl(['site/lowongan']) . '">Semua Kategori</a><br><hr/>';
                ?>
            </p>
        </div>
        <div class="large-9 column">
             <div class="col-lg-12">
                <div class="card-article-hover card">
                    <div class="card-section" style="padding: 10px; padding-top: 20px; margin: 0; width:100%;">
                        <div class="col-lg-12">
                            <p class="article-desc">
                                <i class="fa fa-globe"></i> <a href="http://<?= $dP['perusahaanLink'] ?>" target="_blank"><?= $dP['perusahaanLink'] ?></a> &nbsp;&nbsp; <i class="fa fa-map-marker"></i> <?= $dP['perusahaanAlamat'] ?>
                                <hr/>
                               <?= $dP['perusahaanProfil'] ?>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                 <br>
                 <em class="pull-right"><small>Posted: <?= date("d F Y",strtotime($model->lowonganTglPost)) ?></small></em>
                 <?php
                 function kategoriLowongan($model){
                     if($model != '') {
                         $kategori = [
                             '1' => 'Lowongan Kerja',
                             '2' => 'Lowongan Magang',
                         ];
                         return $kategori[$model];
                     } else {
                         return "-";
                     }
                 }
                 ?>
                 <h3 class="el-title"><?= $model->lowonganNama ?></h3>
                 <b><small class="el-subtitle"><i class="fa fa-star-o"></i> <?= kategoriLowongan($model->lowonganKategoriLowonganID) ?></small></b>
                 <br>
                 <br>
             </div>
            <div class="col-lg-12">
             <div class="col-lg-3 text-center card card-default">
                 <?php
                    $pelamar = \common\models\WebLamaran\WebLamaran::find()->where(['lamaranLowonganID' => $model->lowonganID])->all();
                 ?>
                 <h2><?= count($pelamar) ?></h2>
                 Pelamar<hr/>
                 <?php if(date("Y-m-d") <= $model->lowonganValid){ ?>
                     <small><i>Valid</i></small> <b style="font-size: 15px"><?= date_diff(date_create(date($model->lowonganValid)),date_create())->d ?></b> <small><i>Hari Lagi</i></small>
                 <?php } else { ?>
                     <small><i>Pendaftaran Ditutup</i></small>
                 <?php } ?>
                 <br>
                 <br>
             </div>
             <div class="col-lg-9">
                 <div class="col-lg-12 row">
                     <div class="col-lg-4">
                        <b>Tingkat Lulus </b>
                     </div>
                     <div class="col-lg-8">
                         <?php
                         function tingkatLulus($model){
                             if($model != '') {
                                 $jps = '';
                                 $jP = json_decode($model);
                                 foreach($jP AS $jp){
                                     $s = \common\models\WebJenjangPendidikan::find()->where(['jenjangPendidikanID' => $jp])->orderBy(['jenjangPendidikanNama' => SORT_ASC])->one()['jenjangPendidikanNama'];
                                     if($s != ''){
                                         $jps .= '<span class="badge">'.$s.'</span> ';
                                     }
                                 }
                                 return $jps;
                             } else {
                                 return "-";
                             }
                         }
                         ?>
                         : <?= tingkatLulus($model->lowonganJenjangPendidikan) ?>
                     </div>
                 </div>
                 <div class="clear"></div>
                 <br>
                 <div class="col-lg-12 row">
                     <div class="col-lg-4">
                         <b>Jurusan </b>
                     </div>
                     <div class="col-lg-8">
                         <?php
                         function jurusan($model)
                         {
                             if ($model != '') {
                                 $jps = '';
                                 $jP = json_decode($model);
                                 foreach ($jP AS $jp) {
                                     $s = \common\models\WebJurusan::find()->where(['jurusanID' => $jp])->orderBy(['jurusanNama' => SORT_ASC])->one()['jurusanNama'];
                                     if ($s != '') {
                                         $jps .= '<span class="badge">'.$s.'</span> ';
                                     }
                                 }
                                 return $jps;
                             } else {
                                 return "-";
                             }
                         }
                         ?>
                         : <?= jurusan($model->lowonganJurusan) ?>
                     </div>
                 </div>
                 <div class="clear"></div>
                 <br>
                 <div class="col-lg-12 row">
                     <div class="col-lg-4">
                         <b>IPK </b>
                     </div>
                     <div class="col-lg-8">
                         : <b><?= $model->lowonganIpkMinimal ?></b>
                     </div>
                 </div>
             </div>
            </div>
                 <div class="clear"></div>
                <div class="col-lg-12">
                    <hr/>
                     <div class="col-lg-7 row">
                         <div class="col-lg-5">
                             <b>Posisi </b>
                         </div>
                         <div class="col-lg-7">
                             : <?= $model->lowonganFungsiPekerjaan ?>
                         </div>
                     </div>
                     <div class="col-lg-5 row">

                         <div class="col-lg-6">
                             <b>Level Posisi </b>
                         </div>
                         <div class="col-lg-6">
                             : <?= $model->lowonganLevelPekerjaan ?>
                         </div>
                     </div>
                     <br>
                     <br>
                     <div class="col-lg-7 row">
                        <div class="col-lg-5">
                            <b>Tipe Pekerjaan </b>
                        </div>
                        <div class="col-lg-7">
                            : <?= $model->lowonganTipePekerjaan ?>
                        </div>
                     </div>
                     <div class="col-lg-5 row">

                        <div class="col-lg-6">
                            <b>Status Pekerjaan </b>
                        </div>
                        <div class="col-lg-6">
                            : <?= $model->lowonganStatusPekerjaan ?>
                        </div>
                     </div>
                </div>
                 <div class="clear"></div>
            <div class="col-lg-12">
                 <hr/>
                 <br>
                 <h4 class="el-subtitle">Syarat Umum</h4>
                 <br>
                 <div style="margin-left: 50px">
                     <?= $model->lowonganSyaratUmum ?>
                 </div>
                 <hr/>
                 <br>

                 <h4 class="el-subtitle">Syarat Khusus</h4>
                 <br>
                 <div style="margin-left: 50px">
                     <?= $model->lowonganSyaratKhusus ?>
                 </div>
                 <hr/>
                 <br>

                 <h4 class="el-subtitle">Informasi Umum</h4>
                 <br>
                 <h5 class="el-title">Job Desk</h5>
                 <div style="margin-left: 50px">
                     <?= $model->lowonganJobDesk ?>
                 </div>
                 <br>
                 <h5 class="el-title">Keterangan Lainnya</h5>
                 <div style="margin-left: 50px">
                     <?= $model->lowonganKeterangan ?>
                 </div>
                <hr/>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                    if (date("Y-m-d") <= $model->lowonganValid) {
                ?>
                <i><sup style="color:#F00">*</sup> Pastikan anda telah memenuhi persyaratan diatas dan melengkapi data CV anda pada dashboard user sebelum melakukan pengajuan lamaran.</i>
                <br>
                <br>
                    <?php
                        if (!Yii::$app->user->isGuest) {
                            $cekLamaran = \frontend\models\UserLamaran::find()->where(['lamaranLowonganID' => $model->lowonganID])->andWhere(['lamaranUserID' => Yii::$app->user->identity->userID])->one();
                            if($cekLamaran == null){
                    ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-lamar', 'id' => $model->lowonganID]) ?>" class="btn btn-lg btn-success"><i class="fa fa-briefcase"></i> Ajukan Lamaran Anda</a>
                    <?php   } else {
                                if($cekLamaran['lamaranStatus'] == 'Pending Review') {
                                    ?>
                                    <h3 class="el-title">Anda Telah Melakukan Pendaftaran Pada Lowongan Ini</h3>
                                    <p>Silahkan cek <a href="<?= Yii::$app->urlManager->createUrl(['dashboard']) ?>">Dashboard</a>
                                        anda untuk melihat data lamaran</p>
                                    <?php
                                } else {
                                    ?>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/lowongan-lamar', 'id' => $model->lowonganID]) ?>" class="btn btn-lg btn-success"><i class="fa fa-briefcase"></i> Ajukan Lamaran Anda</a>
                                    <?php
                                }
                            }
                        } else { ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>" target="_blank" class="btn btn-lg btn-success"><i class="fa fa-briefcase"></i> Silahkan Login Untuk Ajukan Lamaran Anda</a>
                    <?php } ?>
                <?php } else { ?>
                        <h3 class="el-title">Maaf, Pendaftaran Telah Ditutup</h3>
                <?php } ?>
                <br>
                </div>
            <div class="clear"></div>
        </div>
    </div>
</div>