<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
        <div class="large-12 small-12 text-center column">
            <br>
            <br>
            <p class="el-subtitle animate " data-animate="fadeInDown" data-duration="1s" data-delay="0.1s" data-offset="50">Mengajukan Lamaran Untuk</p>
            <h4 class="el-title  animate " data-animate="fadeInDown" data-duration="1s" data-delay="0.5s" data-offset="50"><?= $model->lowonganNama ?></h4>
            <div class="col-lg-6 text-center">
                <div class="el-content  animate " data-animate="fadeInRight" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <img style="border: 5px solid #efefef; width: 120px; height: 120px;" src="<?= Yii::$app->request->baseUrl ?>./../../backend/web/logoperusahaan/<?= $dP->perusahaanFoto ?>" alt="thumbs">
                    <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd; margin-bottom: 0"><?= $dP['perusahaanNama'] ?></h2>
                    <p>Perusahaan</p>
<!--                    <p class="small" style="color: #999999;">-->

                    <?php
                        if($status == 'Aktif'){ echo '<span class="badge badge-success"><i class="fa fa-star" style="color: yellow;"></i> <b>Premium Company</b> </span>'; }
                        ?>
<!--                         &nbsp;<i class="fa fa-envelope-o"></i> --><?//= $dP['perusahaanEmail'] ?><!-- | <i class="fa fa-phone"></i> --><?//= $dP['perusahaanTelfon'] ?><!-- | <i class="fa fa-building"></i> --><?//= \common\models\WebJnsIndustri::findOne($dP['perusahaanJnsIndustriID'])['jnsIndustriNama']; ?>
<!--                        --><?php //$dK = \common\models\WebKota::find()->where(['kotaID' => $dP['perusahaanKotaID']])->one() ?>
<!--                    </p>-->
<!--                    <p>-->
<!--                        --><?//= $dK['kotaNama'] ?><!-- - --><?//= $dP['perusahaanNegaraID'] ?>
<!--                    </p>-->
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="el-content  animate " data-animate="fadeInLeft" data-duration="1s" data-delay="0.1s" data-offset="50">
                    <?php if(Yii::$app->user->identity->foto == ''){ ?>
                        <img class="avatar" style=" border: 5px solid #efefef; width: 120px; height: 120px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/avatar.png" alt="avatar">
                    <?php } else { ?>
                        <img class="avatar" style=" border: 5px solid #efefef; width: 120px; height: 120px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= Yii::$app->user->identity->foto; ?>" alt="avatar">
                    <?php } ?>
                    <h2 class="el-title" style="text-shadow: 5px 5px 5px #dddddd; margin-bottom: 0"><?= Yii::$app->user->identity->nama; ?></h2>
                    <p>Pelamar</p>
<!--                    <p class="small" style="color: #999999;"><i class="fa fa-circle-o"></i> --><?php //= ucfirst(Yii::$app->user->identity->role); ?><!-- | <i class="fa fa-envelope-o"></i> --><?php //= Yii::$app->user->identity->email; ?><!-- | <i class="fa fa-at"></i> --><?php //= Yii::$app->user->identity->username; ?><!--</p>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section p-t-30 p-b-60 bg--grey" id="blog" style="background:#ffffff url('images/ppc/ppc_section-bg-01.png') repeat;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;">
    <div class="row">
        <div class="large-12 column animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
             <div class="col-lg-12">
                 <h4 class="text-center">Silahkan gulir halaman ke bawah untuk mengisi form lamaran!</h4>
                 <hr/>
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
             </div>
            <div class="col-lg-12">
                <hr/>
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
                <br>
                <br>
            </div>
            <div class="col-lg-12">
                <div class="card-article-hover card">
                    <div class="card-section" style="padding: 10px; padding-top: 20px; margin: 0; width:100%;">
                        <div class="col-lg-12">
                            <div class="el-content">
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
                            <p class="article-desc">
                                <i class="fa fa-globe"></i> <a href="http://<?= $dP['perusahaanLink'] ?>" target="_blank"><?= $dP['perusahaanLink'] ?></a> &nbsp;&nbsp; <i class="fa fa-map-marker"></i> <?= $dP['perusahaanAlamat'] ?>
                            <hr/>
                            <?= $dP['perusahaanProfil'] ?>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-lg-12">
                <br>
                <br>
                <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/ckeditor.js"></script>
                <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample.js"></script>

                <?php $form = ActiveForm::begin([
                    'options'=>['enctype'=>'multipart/form-data'] // important
                ]); ?>

                <div class="col-md-12">
                    <div class="form-group">
                        <h4 class="text-center">Mengapa Kami Harus Memilih Anda Dalam Pekerjaan Ini?</h4>
                        <p class="text-center">Silahkan isi form dibawah ini sebagai referensi pendukung keputusan kami</p>
                        <?= $form->field($model2, 'lamaranPermohonan')->textarea(['id' => 'editor'])->label(false) ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group text-center">
                        <input type="checkbox" name="agree" required/> <small><i>Saya menetujui seluruh <a href="<?= \common\models\WebSetting::findOne(1)['settingPagePeraturanKebijakan'] ?>" target="_blank"> peraturan dan kebijakan </a> yang berlaku pada sistem </i><b><?= Yii::$app->name; ?></b></small> <span class="text-danger">*</span>
                        <br/>
                        <br/>
                        <?= Html::submitButton('<i class="fa fa-check"></i> Ajukan Permohonan Lamaran', ['class' => 'btn btn-success btn-lg text-center', 'title' => 'Ajukan Permohonan Lamaran']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
                <script>
                    initSample();
                </script>
            </div>
        </div>
    </div>
</div>