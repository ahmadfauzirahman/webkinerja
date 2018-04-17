<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardPelamar */
/* @var $form ActiveForm */
$this->title = "Data CV";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="DashboardPelamar-data-cv">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success pull-right']) ?>
            <p>
                Silahkan lengkapi Data CV anda pada form dibawah ini.
            </p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="panel panel-default">

        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#data-diri" data-toggle="tab" aria-expanded="false">Data Diri</a>
                </li>
                <li><a href="#data-pendidikan" data-toggle="tab" aria-expanded="false">Pendidikan & Keahlian</a>
                </li>
                <li><a href="#data-ortu" data-toggle="tab" aria-expanded="true">Data Orang Tua</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade active in" id="data-diri">
                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <h4 class="el-subtitle">Data Diri Anda</h4>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-lg-4">Tempat Lahir</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarTmptLahir')->textInput(['placeholder' => 'tempat lahir'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Lahir</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarTglLahir')->widget(\kartik\widgets\DatePicker::className(),[
                                        'options' => [
                                            'placeholer' => "masukkan batas tanggal..."
                                        ],
                                        'value' => date('Y-m-d', strtotime('+2 days')),
                                        'pluginOptions' => [
                                            'autoclose' => TRUE,
                                            'format' => 'yyyy-mm-dd',
                                            'todayHighlight' => true
                                        ],
                                    ])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Jenis Kelamin</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarJK')->radioList(['L' => 'Laki-laki', 'P' => 'Perempuan'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Agama</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarAgama')->dropDownList([
                                        'Islam'=>'Islam',
                                        'Katholik' => 'Katholik',
                                        'Protestan' => 'Protestan',
                                        'Hindu' => 'Hindu',
                                        'Budha' => 'Budha',
                                        'Kong Hu Chu' => 'Kong Hu Chu',
                                    ],['prompt' => 'Pilih Agama anda...'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Kewarganegaraan</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarKewarganegaraan')->radioList(['WNI' => 'WNI', 'WNA' => 'WNA'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Gol. Darah</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarGolDarah')->dropDownList([
                                        'O' => 'O',
                                        'A' => 'A',
                                        'B' => 'B',
                                        'AB' => 'AB',
                                    ],['prompt' => 'Pilih Gol. Darah anda...'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Berat Badan (KG)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarBeratBadan')->textInput(['placeholder' => 'berat badan (kg)'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tinggi Badan (CM)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarTinggiBadan')->textInput(['placeholder' => 'tinggi badan (cm)'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">No. Telepon</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarTelfon')->textInput(['placeholder' => 'nomor telepon'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Alamat</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarAlamat')->textarea(['placeholder' => 'alamat anda'])->label(false) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="data-pendidikan">

                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <h4 class="el-subtitle">Data Pendidikan & Keahlian</h4>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-lg-4">Pendidikan Formal</label>
                                <div class="col-lg-8">
                                    <div class="input_fields_wrap">
                                        <div class="form-group">
                                            <button type="button" class="add_field_button btn btn-warning btn-small" style="margin-left:10px;" data-delay="50"><i class="fa fa-plus"></i> Tambah Data</button>
                                        </div>
                                        <?php $no = 0; if($model->pelamarPendididkanFormal != null){
                                            foreach($model->pelamarPendididkanFormal AS $pf){ ?>
                                                <?php if($no == 0){ ?>
                                                    <div><div class="input-field input_fields_wrap<?= $no++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpendididkanformal" name="DashboardPelamar[pelamarPendididkanFormal][]" type="text" class="form-control" placeholder="pendidikan formal" value="<?= $pf ?>"></div></div>
                                                <?php } else { ?>
                                                    <div><div class="input-field input_fields_wrap<?= $no++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpendididkanformal" name="DashboardPelamar[pelamarPendididkanFormal][]" type="text" class="form-control" placeholder="pendidikan formal" value="<?= $pf ?>"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>
                                                <?php } ?>
                                            <?php }
                                        } else { ?>
                                            <div><div class="input-field input_fields_wrap col-lg-11"><input id="dashboardpelamar-pelamarpendididkanformal" name="DashboardPelamar[pelamarPendididkanFormal][]" type="text" class="form-control" placeholder="pendidikan formal"></div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <?php

                            $js = <<< JS


                $(document).ready(function() {
                    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                    var add_button      = $(".add_field_button"); //Add button ID
                    var x = 1; //initlal text box count
        
                    $(add_button).click(function(e){ //on add input button click
                        e.preventDefault();
                        //if(x < max_fields){ //max input box allowed
                        //   x++; //text box increment
                            $(wrapper).append('<div><div class="input-field input_fields_wrap col-lg-11"><input id="dashboardpelamar-pelamarpendididkanformal" name="DashboardPelamar[pelamarPendididkanFormal][]" type="text" class="form-control" placeholder="pendidikan formal"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>'); //add input box
                        //}
                    });
                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove(); x--;
                    })
                });

JS;
                            $this->registerJs($js);
                            ?>



                            <div class="form-group">
                                <label class="col-lg-4">Pendidikan Non Formal</label>
                                <div class="col-lg-8">
                                    <div class="input_fields_wrapss">
                                        <div class="form-group">
                                            <button type="button" class="add_field_buttons btn btn-warning btn-small" style="margin-left:10px;" data-delay="50"><i class="fa fa-plus"></i> Tambah Data</button>
                                        </div>
                                        <?php $nos = 0; if($model->pelamarPendidikanNonFormal != null){
                                            foreach($model->pelamarPendidikanNonFormal AS $pfs){ ?>
                                                <?php if($nos == 0){ ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpendidikannonformal" name="DashboardPelamar[pelamarPendidikanNonFormal][]" type="text" class="form-control" placeholder="pendidikan non formal" value="<?= $pfs ?>"></div></div>
                                                <?php } else { ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpendidikannonformal" name="DashboardPelamar[pelamarPendidikanNonFormal][]" type="text" class="form-control" placeholder="pendidikan non formal" value="<?= $pfs ?>"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>
                                                <?php } ?>
                                            <?php }
                                        } else { ?>
                                            <div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpendidikannonformal" name="DashboardPelamar[pelamarPendidikanNonFormal][]" type="text" class="form-control" placeholder="pendidikan non formal"></div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <?php

                            $jss = <<< JS


                $(document).ready(function() {
                    var wrappers         = $(".input_fields_wrapss"); //Fields wrapper
                    var add_buttons      = $(".add_field_buttons"); //Add button ID
        
                    $(add_buttons).click(function(e){ //on add input button click
                        //e.preventDefault();
                        //if(x < max_fields){ //max input box allowed
                        //   x++; //text box increment
                            $(wrappers).append('<div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpendidikannonformal" name="DashboardPelamar[pelamarPendidikanNonFormal][]" type="text" class="form-control" placeholder="pendidikan non formal"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>'); //add input box
                        //}
                    });
                    $(wrappers).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove();
                    })
                });

JS;
                            $this->registerJs($jss);
                            ?>





                            <div class="form-group">
                                <label class="col-lg-4">Pengalaman Akademik</label>
                                <div class="col-lg-8">
                                    <div class="input_fields_wrapsss">
                                        <div class="form-group">
                                            <button type="button" class="add_field_buttonss btn btn-warning btn-small" style="margin-left:10px;" data-delay="50"><i class="fa fa-plus"></i> Tambah Data</button>
                                        </div>
                                        <?php $nos = 0; if($model->pelamarPengalamanAkademik != null){
                                            foreach($model->pelamarPengalamanAkademik AS $pfs){ ?>
                                                <?php if($nos == 0){ ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpengalamanakademik" name="DashboardPelamar[pelamarPengalamanAkademik][]" type="text" class="form-control" placeholder="pengalaman akademik" value="<?= $pfs ?>"></div></div>
                                                <?php } else { ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpengalamanakademik" name="DashboardPelamar[pelamarPengalamanAkademik][]" type="text" class="form-control" placeholder="pengalaman akademik" value="<?= $pfs ?>"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>
                                                <?php } ?>
                                            <?php }
                                        } else { ?>
                                            <div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpengalamanakademik" name="DashboardPelamar[pelamarPengalamanAkademik][]" type="text" class="form-control" placeholder="pengalaman akademik"></div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <?php

                            $jsss = <<< JS


                $(document).ready(function() {
                    var wrapperss         = $(".input_fields_wrapsss"); //Fields wrapper
                    var add_buttonss      = $(".add_field_buttonss"); //Add button ID
        
                    $(add_buttonss).click(function(e){ //on add input button click
                        //e.preventDefault();
                        //if(x < max_fields){ //max input box allowed
                        //   x++; //text box increment
                            $(wrapperss).append('<div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpengalamanakademik" name="DashboardPelamar[pelamarPengalamanAkademik][]" type="text" class="form-control" placeholder="pengalaman akademik"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>'); //add input box
                        //}
                    });
                    $(wrapperss).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove();
                    })
                });

JS;
                            $this->registerJs($jsss);
                            ?>



                            <div class="form-group">
                                <label class="col-lg-4">Pengalaman Kerja</label>
                                <div class="col-lg-8">
                                    <div class="input_fields_wrapssss">
                                        <div class="form-group">
                                            <button type="button" class="add_field_buttonsss btn btn-warning btn-small" style="margin-left:10px;" data-delay="50"><i class="fa fa-plus"></i> Tambah Data</button>
                                        </div>
                                        <?php $nos = 0; if($model->pelamarPengalamanKerja != null){
                                            foreach($model->pelamarPengalamanKerja AS $pfs){ ?>
                                                <?php if($nos == 0){ ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpengalamankerja" name="DashboardPelamar[pelamarPengalamanKerja][]" type="text" class="form-control" placeholder="pengalaman kerja" value="<?= $pfs ?>"></div></div>
                                                <?php } else { ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarpengalamankerja" name="DashboardPelamar[pelamarPengalamanKerja][]" type="text" class="form-control" placeholder="pengalaman kerja" value="<?= $pfs ?>"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>
                                                <?php } ?>
                                            <?php }
                                        } else { ?>
                                            <div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpengalamankerja" name="DashboardPelamar[pelamarPengalamanKerja][]" type="text" class="form-control" placeholder="pengalaman kerja"></div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <?php

                            $jssss = <<< JS


                $(document).ready(function() {
                    var wrappersss         = $(".input_fields_wrapssss"); //Fields wrapper
                    var add_buttonsss      = $(".add_field_buttonsss"); //Add button ID
        
                    $(add_buttonsss).click(function(e){ //on add input button click
                        //e.preventDefault();
                        //if(x < max_fields){ //max input box allowed
                        //   x++; //text box increment
                            $(wrappersss).append('<div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarpengalamankerja" name="DashboardPelamar[pelamarPengalamanKerja][]" type="text" class="form-control" placeholder="pengalaman kerja"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>'); //add input box
                        //}
                    });
                    $(wrappersss).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove();
                    })
                });

JS;
                            $this->registerJs($jssss);
                            ?>


                            <div class="form-group">
                                <label class="col-lg-4">Keahlian Lainnya</label>
                                <div class="col-lg-8">
                                    <div class="input_fields_wrapsssss">
                                        <div class="form-group">
                                            <button type="button" class="add_field_buttonssss btn btn-warning btn-small" style="margin-left:10px;" data-delay="50"><i class="fa fa-plus"></i> Tambah Data</button>
                                        </div>
                                        <?php $nos = 0; if($model->pelamarKemampuan != null){
                                            foreach($model->pelamarKemampuan AS $pfs){ ?>
                                                <?php if($nos == 0){ ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarkemampuan" name="DashboardPelamar[pelamarKemampuan][]" type="text" class="form-control" placeholder="keahlian lainnya" value="<?= $pfs ?>"></div></div>
                                                <?php } else { ?>
                                                    <div><div class="input-field input_fields_wraps<?= $nos++ ?> col-lg-11"><input id="dashboardpelamar-pelamarkemampuan" name="DashboardPelamar[pelamarKemampuan][]" type="text" class="form-control" placeholder="keahlian lainnya" value="<?= $pfs ?>"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>
                                                <?php } ?>
                                            <?php }
                                        } else { ?>
                                            <div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarkemampuan" name="DashboardPelamar[pelamarKemampuan][]" type="text" class="form-control" placeholder="keahlian lainnya"></div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $jssss = <<< JS


                $(document).ready(function() {
                    var wrapperssss         = $(".input_fields_wrapsssss"); //Fields wrapper
                    var add_buttonssss      = $(".add_field_buttonssss"); //Add button ID
        
                    $(add_buttonssss).click(function(e){ //on add input button click
                        //e.preventDefault();
                        //if(x < max_fields){ //max input box allowed
                        //   x++; //text box increment
                            $(wrapperssss).append('<div><div class="input-field input_fields_wraps col-lg-11"><input id="dashboardpelamar-pelamarkemampuan" name="DashboardPelamar[pelamarKemampuan][]" type="text" class="form-control" placeholder="keahlian lainnya"></div><button type="button" href="javascript:;" class="remove_field col-lg-1"><i class="fa fa-close"></i></button></div>'); //add input box
                        //}
                    });
                    $(wrapperssss).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove();
                    })
                });

JS;
                            $this->registerJs($jssss);
                            ?>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="data-ortu">
                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <h4 class="el-subtitle">Data Orang Tua</h4>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-lg-4">Nama Ayah (Kandung)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarNamaAyah')->textInput(['placeholder' => 'nama ayah'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Nama Ibu (Kandung)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarNamaIbu')->textInput(['placeholder' => 'nama ibu'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Pekerjaan Ayah (Kandung)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarPekerjaanAyah')->textInput(['placeholder' => 'pekerjaan ayah'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Pekerjaan Ibu (Kandung)</label>
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'pelamarPekerjaanIbu')->textInput(['placeholder' => 'pekerjaan ayah'])->label(false) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div><!-- DashboardPelamar-data-cv -->

