<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebUniv */

$this->title = $model->univID;
$this->params['breadcrumbs'][] = ['label' => 'Web Univs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-univ-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->univID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->univID], [
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
            'univID',
            'univNama',
            'univStatus:ntext',
        ],
    ]) ?>

</div>
