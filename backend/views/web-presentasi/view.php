<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebPresentasi */

$this->title = "jadwal presentasi";
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Presentasi', 'url' => ['index', 'id'=>$model->presentasiEventsID]];
$this->params['breadcrumbs'][] = \common\models\WebPerusahaan::findOne($model->presentasiPerusahaanID)['perusahaanNama'];
?>
<div class="web-presentasi-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->presentasiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->presentasiID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'presentasiID',
            [
                    'attribute' => 'presentasiEventsID',
                    'value' => function($model) {
                        return \common\models\WebEvents::findOne($model->presentasiEventsID)['eventsJudul'];
                    }
            ],

            'presentasiTglMulai',
            'presentasiTglSelesai',

            [
                'attribute' => 'presentasiPerusahaanID',
                'value' => function($model) {
                    return \common\models\WebPerusahaan::findOne($model->presentasiPerusahaanID)['perusahaanNama'];
                }
            ],

        ],
    ]) ?>

</div>
