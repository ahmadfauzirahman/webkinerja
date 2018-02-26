<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WebProvinsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-provinsi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Provinsi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped no-margin'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'provinsiID',
            'provinsiNama',
            'provinsiStatus:ntext',

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
