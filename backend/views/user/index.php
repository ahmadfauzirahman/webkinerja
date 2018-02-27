<?php

use app\models\Departement;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $model backend\models\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pengguna');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Tambah Pengguna'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped no-margin'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'userID',
            'username',
//            'password',
//            'nama',
            'email:email',
            // 'telepon',
            'role',

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
    <?php Pjax::end(); ?></div>
