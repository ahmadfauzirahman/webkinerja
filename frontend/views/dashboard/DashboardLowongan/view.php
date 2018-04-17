<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dashboard\DashboardLowongan */

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Lowongan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->lowonganID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-lowongan-view">

    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->lowonganID], ['class' => 'btn btn-success', 'title' => 'Update']) ?>
        </span>
    <h4 class="el-subtitle">Lowongan Anda</h4>
    Anda bisa membuat lowongan pekerjaan yang diterbitkan ke publik
    </p>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lowonganID',
            //'lowonganPerusahaanID',
            [
                'attribute' => 'lowonganKategoriLowonganID',
                'label' => 'Kategori',
                'value' => function($model){
                    if($model->lowonganKategoriLowonganID != '') {
                        $kategori = [
                            '1' => 'Lowongan Kerja',
                            '2' => 'Lowongan Magang',
                        ];
                        return $kategori[$model->lowonganKategoriLowonganID];
                    } else {
                        return "-";
                    }
                },
            ],
            'lowonganNama:ntext',
            'lowonganFungsiPekerjaan',
            'lowonganLevelPekerjaan',
            'lowonganTipePekerjaan',
            'lowonganStatusPekerjaan:ntext',
            //'lowonganJenjangPendidikan:ntext',
            [
                'attribute' => 'lowonganJenjangPendidikan',
                    'value' => function($model){
                        if($model->lowonganJenjangPendidikan != '') {
                            $jps = '';
                            $jP = json_decode($model->lowonganJenjangPendidikan);
                            $no = 0;
                            $end = count($jP);
                            foreach($jP AS $jp){
                                $no++;
                                if($end == $no){
                                    $separator = '. ';
                                } else {
                                    $separator = ', ';
                                }
                                $s = \common\models\WebJenjangPendidikan::find()->where(['jenjangPendidikanID' => $jp])->orderBy(['jenjangPendidikanNama' => SORT_ASC])->one()['jenjangPendidikanNama'];
                                if($s != ''){
                                    $jps .= ' '.$s.$separator." ";
                                }
                            }
                            return $jps;
                        } else {
                            return "-";
                        }
                    },
            ],
            //'lowonganJurusan:ntext',
            [
                'attribute' => 'lowonganJurusan',
                'value' => function($model){
                    if($model->lowonganJurusan != '') {
                        $jps = '';
                        $jP = json_decode($model->lowonganJurusan);
                        $no = 0;
                        $end = count($jP);
                        foreach($jP AS $jp){
                            $no++;
                            if($end == $no){
                                $separator = '. ';
                            } else {
                                $separator = ', ';
                            }
                            $s = \common\models\WebJurusan::find()->where(['jurusanID' => $jp])->orderBy(['jurusanNama' => SORT_ASC])->one()['jurusanNama'];
                            if($s != ''){
                                $jps .= ' '.$s.$separator." ";
                            }
                        }
                        return $jps;
                    } else {
                        return "-";
                    }
                },
            ],
            'lowonganIpkMinimal',
            'lowonganTglPost:datetime',
            'lowonganValid:datetime',
            'lowonganDaftarOnline:ntext',
            'lowonganStatus:ntext',
            'lowonganSyaratUmum:html',
            'lowonganSyaratKhusus:html',
            'lowonganJobDesk:html',
            'lowonganKeterangan:html',
        ],
    ]) ?>

    <hr/>
    <h3>Seleksi <?= Html::a('<i class="fa fa-pencil"></i> Ubah Data Seleksi', ['/dashboard-seleksi/index','lowongan' => $model->lowonganID], ['class' => 'btn btn-success', 'title' => 'Ubah Data Seleksi']) ?></h3>
    <?php
    $model = \frontend\models\Dashboard\DashboardSeleksi::find()->where(['seleksiLowonganID' => $model->lowonganID])->orderBy(['seleksiTglAwal' => SORT_ASC])->all();
    if(count($model) == 0){ echo "Data seleksi tidak ditemukan"; }
    ?>
    <table class="table table-striped table-bordered detail-view">
        <?php
        $no = 1;
        foreach($model AS $data){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['seleksiNama'] ?></td>
                <td class="text-center"><?= $data['seleksiTglAwal'] ?><br> s/d <br><?= $data['seleksiTglAkhir'] ?></td>
                <td><?= $data['seleksiTempat'] ?></td>
                <td><?= $data['seleksiStatus'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>
