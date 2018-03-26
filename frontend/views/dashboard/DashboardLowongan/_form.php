<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <span class="pull-right">
        <?= Html::a('<i class="fa fa-close"></i> Cancel', ['index'], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?> <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success', 'title' => 'Save']) ?>
        </span>
    <h4 class="el-subtitle">Lowongan Anda</h4>
    Anda bisa membuat lowongan pekerjaan yang diterbitkan ke publik
    </p>
    <hr/>

    <div class="col-md-12">
        <div class="form-group">
            <?= $form->field($model, 'lowonganNama')->textInput(['rows' => 6,'placeholder' => 'judul lowongan']) ?>
        </div>
    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'lowonganKategoriLowonganID')->dropDownList(['1'=>'Lowongan Kerja','2' => 'Lowongan Magang'],['prompt' => 'pilih kategori lowongan...']) ?>

        <?= $form->field($model, 'lowonganFungsiPekerjaan')->textInput(['maxlength' => true,'placeholder' => 'tipe pekerjaan']) ?>

        <?= $form->field($model, 'lowonganTipePekerjaan')->dropDownList(['Full Time'=>'Full Time','Part Time' => 'Part Time', 'Kontrak' => 'Kontrak'],['prompt' => 'pilih tipe kerja...']) ?>

    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'lowonganLevelPekerjaan')->textInput(['maxlength' => true,'placeholder' => 'level pekerjaan']) ?>

        <?= $form->field($model, 'lowonganStatusPekerjaan')->textInput(['rows' => 6,'placeholder' => 'status pekerjaan']) ?>

        <?= $form->field($model, 'lowonganValid')->widget(\kartik\widgets\DatePicker::className(),[
                    'options' => [
                        'placeholer' => "masukkan batas tanggal..."
                    ],
                    'value' => date('Y-m-d', strtotime('+2 days')),
                    'pluginOptions' => [
                        'autoclose' => TRUE,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ],
        ]) ?>

    </div>

    <div class="col-md-12">
        <div class="form-group">
        <?php

            $listJp= \common\models\WebJenjangPendidikan::find()->select('jenjangPendidikanID,jenjangPendidikanNama')
                ->where(['jenjangPendidikanStatus' => 'Aktif'])
                ->orderBy(['jenjangPendidikanNama' => SORT_ASC])
                ->all();
            $list   = ArrayHelper::map( $listJp,'jenjangPendidikanID','jenjangPendidikanNama');


        if(!$model->isNewRecord) {
            $checkedList = json_decode($model->lowonganJenjangPendidikan); //get selected value from db if value exist
            $model->lowonganJenjangPendidikan = $checkedList;
        } else {
            $checkedList = [];
        }

        ?>

        <?= $form->field($model, 'lowonganJenjangPendidikan')->checkboxList($list,[
            //'separator' => false,
            'item' => function($model, $label, $name, $checked, $value) use ($checkedList) {
                if($checkedList != null) {
                    $checked = '';
                    foreach ($checkedList AS $c) {
                        if ($c == $value) {
                            $checked = 'checked'; //get selected value from db if value exist
                        }
                    }
                }
                return "<label class='ckbox ckbox-primary col-md-4'><input type='checkbox' {$checked} name='{$name}' value='{$value}' tabindex='3'> {$label}</label>";
            }

        ]); ?>
        </div>
        <div class="clear"></div><br>
        <div class="form-group">
        <?php

        $listJj= \common\models\WebJurusan::find()->select('jurusanID,jurusanNama')
            ->where(['jurusanStatus' => 'Aktif'])
            ->orderBy(['jurusanNama' => SORT_ASC])
            ->all();
        $list2   = ArrayHelper::map( $listJj,'jurusanID','jurusanNama');


        if(!$model->isNewRecord) {
            $checkedList2 = json_decode($model->lowonganJurusan); //get selected value from db if value exist
            $model->lowonganJurusan = $checkedList2;
        } else {
            $checkedList2 = [];
        }

        ?>

        <?= $form->field($model, 'lowonganJurusan')->checkboxList($list2,[
            //'separator' => false,
            'item' => function($model, $label, $name, $checked, $value) use ($checkedList2) {

                if($checkedList2 != null) {
                    $checked = '';
                    foreach ($checkedList2 AS $c) {
                        if ($c == $value) {
                            $checked = 'checked'; //get selected value from db if value exist
                        }
                    }
                }
                return "<label class='ckbox ckbox-primary col-md-4'><input type='checkbox' {$checked} name='{$name}' value='{$value}' tabindex='3'> {$label}</label>";
            }

        ]); ?>
        </div>
    </div>
        <div class="clear"></div><br>
            <div class="col-md-6">
            <?= $form->field($model, 'lowonganIpkMinimal')->textInput(['maxlength' => true,'placeholder' => 'IPK minimal']) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'lowonganDaftarOnline')->dropDownList(['Ya'=>'Ya','Tidak' => 'Tidak']) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'lowonganStatus')->dropDownList(['Aktif'=>'Aktif','Non Aktif' => 'Non Aktif']) ?>
            </div>
    <div class="col-md-12">

    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/ckeditor.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample2.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample3.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/assets/ckeditor/samples/js/sample4.js"></script>

    <?= $form->field($model, 'lowonganSyaratUmum')->textarea(['rows' => 6,'placeholder' => 'syarat umum','id' => 'editor']) ?>

    <?= $form->field($model, 'lowonganSyaratKhusus')->textarea(['rows' => 6,'placeholder' => 'syarat khusus','id' => 'editor2']) ?>

    <?= $form->field($model, 'lowonganJobDesk')->textarea(['rows' => 6,'placeholder' => 'job desk','id' => 'editor3']) ?>

    <?= $form->field($model, 'lowonganKeterangan')->textarea(['rows' => 6,'placeholder' => 'keterangan','id' => 'editor4']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    initSample();
    initSample2();
    initSample3();
    initSample4();
</script>