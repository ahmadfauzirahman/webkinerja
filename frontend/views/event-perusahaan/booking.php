<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:23 PM
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<br><br>
<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:50px;padding-bottom: 20px;
    ">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <h2 class="el-title"><?php echo $stand->standsNama?></h2>
        <p class="el-subtitle">No booth 20</p>
        <div class="divider float-left"></div>
    </div>
</div>
<div class="section" style="padding: 50px">
    <div class="row text-center">
        <div class="panel panel-default panel-fade">

            <div class="panel-heading">

							<span class="panel-title">

								<div class="pull-left">



								</div>
								<div class="clearfix"></div>

							</span>

            </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="form">
                        <h2 class="el-title">Formulir Booking Stand <?php echo $stand->standsNama?></h2>
                        <div class="divider"></div>
                        <br>
                        <?= $this->render('_form-booking', [
                            'model' => $model,
                            'id' => $event->eventsID,
                            'id_stand' => $stand->standsID,
                            'perusahaan' => $perusahaan
                        ]) ?>
                    </div>


                    <div class="tab-pane fade" id="fasilitas">
                        <h3 class="el-title">Fasilitas Stand</h3>
                        <div class="divider"></div>
                        <br>


                    </div>

                </div>

            </div>

        </div>



    </div>
</div>

<?php

$script = <<< JS
    jQuery.noConflict();

JS;
$this->registerJs($script);
?>
