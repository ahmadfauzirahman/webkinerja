<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User\DashboardBerkasPelamar */

$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Data Berkas Pelamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->berkasPelamarID];

?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<div class="dashboard-berkas-pelamar-view">

    <p>
        <span class="pull-right">
                    <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default', 'title' => 'Kembali']) ?>
                    <?= Html::a('<i class="fa fa-pencil"></i> Update Berkas', ['update', 'id' => $model->berkasPelamarID], ['class' => 'btn btn-success']) ?>
        </span><h4 class="el-subtitle">Berkas Anda</h4>
    Berkas-berkas yang anda upload menjadi referensi tambahan bagi perusahaan.
    </p>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
