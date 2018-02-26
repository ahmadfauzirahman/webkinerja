<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebFakultas */

$this->title = $model->fakultasID;
$this->params['breadcrumbs'][] = ['label' => 'Web Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-fakultas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fakultasID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fakultasID], [
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
            'fakultasID',
            'fakultasNama',
            [
              'attribute' => 'fakultasUnivID',
                'value' => function($model) {
                    return \common\models\WebUniv::findOne($model->fakultasUnivID)['univNama'];
                }
            ],
            'fakultasStatus:ntext',
        ],
    ]) ?>

</div>
