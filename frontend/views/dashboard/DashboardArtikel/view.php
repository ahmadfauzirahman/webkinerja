<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikel */


$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->artikelID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="web-artikel-view">


    <p>
        <span class="pull-right">
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default', 'title' => 'Cancel']) ?>
            <?php if($model->artikelStatus == 'Draf'){ ?>
                <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->artikelID], ['class' => 'btn btn-success']) ?>
            <?php } ?>
        </span>
    <h4 class="el-subtitle">Artikel Anda</h4>
    Anda bisa menulis artikel untuk diterbitkan ke publik
    </p>
    <hr/>

        <div class="col-md-12">
            <h1><?= $model->artikelJudul ?></h1>
            <hr/>
        </div>
        <div class="col-md-8">
        <?=
            $model->artikelIsi;
        ?>
        </div>
        <div class="col-md-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'artikelID',
                    [
                        'attribute' =>
                            'artikelKategoriID',
                        'value' => function ($model) {
                            return \common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($model->artikelKategoriID)['kategoriArtikelNama'];
                        }
                    ],
                    'artikelUserID',
                    //'artikelJudul:ntext',
//            [
//              'label' => 'artikelIsi',
//                'value' => function($model){
//                    return substr($model->artikelIsi,0,100).'...';
//                },
//                'format' => 'html',
//            ],
                    [
                        'label' => 'Artikel Thumbnails',
                        'format' => 'raw',
                        'value' => '<a href="./../../backend/web/thumbnails/' . $model->artikelThumbnails . '" target="_blank" class="btn btn-default"><img src="./../../backend/web/thumbnails/' . $model->artikelThumbnails . '" width="80px" height="auto"/></a>

',
                    ],
                    'artikelTglPost',
                    'artikeReader',
                    'artikelStatus:ntext',
                ],
            ]) ?>
        </div>

</div>
