<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:04 PM
 */
?>

<br><br>
<div class="banner" style="width: 100%;">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails;?>" alt="">
</div>

<div class="section" style="
        background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
        padding-top:20px;padding-bottom: 10px;
        ">
    <div class="row">
        <h2 class="el-title">Jadwal <?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>

<div class="section" style="padding: 50px 0;">
    <div class="row">
        <div class="panel panel-default panel-fade">

            <div class="panel-heading">

							<span class="panel-title">

								<div class="pull-left">

								<ul class="nav nav-tabs">
									<li class="active"><a href="#letters" data-toggle="tab"> Jadwal tes</a></li>
									<li><a href="#emails" data-toggle="tab">Jadwal Presentasi</a></li>
								</ul>

								</div>



								<div class="clearfix"></div>

							</span>

            </div>

            <div class="panel-body">


                <div class="tab-content">






                    <div class="tab-pane fade in active" id="letters">
                        <h3 class="el-title">Jadwal Tes</h3>
                        <p class="el-subtitle">Berikut jadwal tes perusahaan suska karir 2018.</p>
                        <br>

                        <TABLE class="table table-striped">
                            <THEAD>
                            <th>No</th><th>Nama Perusahaan</th><th>Tempat Tes</th>><th>Tanggal</th><th>Jam</th>
                            </THEAD>
                            <TBODY>
                            <?php if (isset($jadwaltes)):?>
                                <?php $a=0; foreach ($jadwaltes as $data):?>
                                    <tr>
                                        <?php $perusahaanID = \common\models\WebLowongan::findOne($data->seleksiLowonganID)['lowonganPerusahaanID']?>
                                        <td><?= ++$a ?></td>
                                        <td><?= \common\models\WebPerusahaan::findOne($perusahaanID)['perusahaanNama'] ?></td>
                                        <td><?= $data->seleksiTempat ?></td>
                                        <td><?= date('d F Y', strtotime($data->seleksiTglAwal))?></td>
                                        <td><?= date('G.i', strtotime($data->seleksiTglAwal))." WIB" ?></td>
                                    </tr>
                                <?php endforeach; endif;?>
                            </TBODY>
                        </TABLE>

                    </div>


                    <div class="tab-pane fade" id="emails">
                        <h3 class="el-title">Jadwal Presentasi Perusahaan</h3>
                        <p class="el-subtitle">Berikut jadwal Presentasi Perusahaan suska karir 2018.</p>
                        <br>
                        <TABLE class="table table-striped">
                            <THEAD>
                            <th>No</th><th>Tanggal</th><th>Jam</th><th>Perusahaan</th>
                            </THEAD>
                            <TBODY>
                            <?php if (isset($presentasi)):?>
                                <?php $a=0; foreach ($presentasi as $data):?>
                                    <tr>
                                        <td><?= ++$a ?></td>
                                        <td><?= date('d F Y', strtotime($data->presentasiTglMulai))?></td>
                                        <td><?= date('G.i', strtotime($data->presentasiTglMulai))." - ".date('G.i', strtotime($data->presentasiTglSelesai))." WIB" ?></td>
                                        <td><?= \common\models\WebPerusahaan::findOne($data->presentasiPerusahaanID)['perusahaanNama'] ?></td>
                                    </tr>
                                <?php endforeach; endif;?>
                            </TBODY>
                        </TABLE>

                    </div

                </div>

            </div>

        </div>
    </div>
</div>
</div>