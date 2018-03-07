<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebStands */

$this->title = $model->standsNama;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Stands', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-stands-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->standsID, 'id2'=>$model->standsEventsID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->standsID], [
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
            'standsID',
//            'standsVenueID',
            [
                'attribute' => 'standsVenueID',
                'value' => function($model){
                    return \common\models\WebVenue::findOne($model->standsVenueID)['venueNama'];
                }
            ],
//            'standsEventsID',
            [
                'attribute' => 'standsEventsID',
                'value' => function($model){
                    return \common\models\WebEvents::findOne($model->standsEventsID)['eventsJudul'];
                }
            ],
            'standsNama',
//            'standsKategoriStandID',
            [
                'attribute' => 'standsKategoriStandID',
                'value' => function($model){
                    return \common\models\WebKategoriStand::findOne($model->standsKategoriStandID)['kategoriStandNama'];
                }
            ],
            'standsPerusahaanID',
            'standsStatus:ntext',
        ],
    ]) ?>

</div>
