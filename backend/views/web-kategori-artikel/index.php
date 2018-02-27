<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebKategoriArtikel\WebKategoriArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Kategori Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-artikel-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web Kategori Artikel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'kategoriArtikelID',
            'kategoriArtikelNama:ntext',
            'kategoriArtikelStatus:ntext',

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
