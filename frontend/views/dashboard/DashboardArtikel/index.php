<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebArtikel\WebArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Artikel";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="web-artikel-index">

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Tulis Artikel Baru', ['create'], ['class' => 'btn pull-right btn-success', 'title' => 'Tulis Artikel Baru']) ?>
        <h4 class="el-subtitle">Artikel Anda</h4>
        Anda bisa menulis artikel untuk diterbitkan ke publik
    </p>
    <hr/>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'artikelID',
            'artikelJudul:ntext',
            //'artikelKategoriID',
            [
                'attribute' =>
                    'artikelKategoriID',
                'value' => function ($model) {
                    return \common\models\WebKategoriArtikel\WebKategoriArtikel::findOne($model->artikelKategoriID)['kategoriArtikelNama'];
                }
            ],
            //'artikelUserID',
            //'artikelIsi:html',
            //'artikelThumbnails:ntext',
            'artikelTglPost:datetime',
            //'artikeReader',
            'artikelStatus:ntext',

            ['class' => 'yii\grid\ActionColumn','visibleButtons' =>
                [
                    'delete' =>  function($model){
                        if($model->artikelStatus == 'Draf'){
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'update' => function($model){
                        if($model->artikelStatus == 'Draf'){
                            return true;
                        } else {
                            return false;
                        }
                    }
                ]],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
