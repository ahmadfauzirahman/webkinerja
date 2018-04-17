<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\User\DashboardBerkasPelamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Data Berkas Pelamar";
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-berkas-pelamar-index">

<!--    --><?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-upload"></i> Upload Berkas Anda', ['create'], ['class' => 'btn pull-right btn-success', 'title' => 'Tulis Artikel Baru']) ?>
    <h4 class="el-subtitle">Berkas Anda</h4>
    Berkas-berkas yang anda upload menjadi referensi tambahan bagi perusahaan.
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

//            'berkasPelamarID',
//            'berkasPelamarUserID',
            'berkasPelamarNama:ntext',
//            'berkasPelamarFile:ntext',
            [
                'attribute' => 'berkasPelamarFile',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->berkasPelamarFile,'berkaspelamar/' . Yii::$app->user->identity->userID . '/' . $model->berkasPelamarFile,['target' => '_blank']);
                }
            ],
            [
                'attribute' => 'berkasPelamarStatus',
                'value' => function($model){
                    if($model->berkasPelamarStatus == "1"){
                        return "Publik";
                    } elseif($model->berkasPelamarStatus == "0"){
                        return "Private";
                    } else {
                        return "Undefine";
                    }
                },
            ],
//            'berkasPelamarStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
<!--    --><?php //Pjax::end(); ?>
</div>
