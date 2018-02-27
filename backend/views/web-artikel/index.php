<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebArtikel\WebArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-artikel-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Artikel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
            'artikelUserID',
            //'artikelIsi:html',
            //'artikelThumbnails:ntext',
            //'artikelTglPost',
            //'artikeReader',
            //'artikelStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'layout' =>
            '<div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                           <div>{summary}</div>
                              {items}
                              <div class="col-lg-12 small-padding">{summary}</div>
                               <div class="pager no-padding no-margin card-foot text-center">
                                    {pager}
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div>',
    ]); ?>
    <?php Pjax::end(); ?>
</div>
