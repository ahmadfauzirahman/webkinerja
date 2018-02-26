<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WebKotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nama Kota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Nama Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped no-margin'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'kotaID',
            [
                'attribute' => 'kotaProvinsiID',
                'value' => function ($model) {
                    return \common\models\WebProvinsi::findOne($model->kotaProvinsiID)['provinsiNama'];
                }
            ],
            'kotaNama',
            'kotaStatus:ntext',

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
