<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebJenjangPendidikan */

$this->title = $model->jenjangPendidikanID;
$this->params['breadcrumbs'][] = ['label' => 'Web Jenjang Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jenjang-pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jenjangPendidikanID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jenjangPendidikanID], [
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
            'jenjangPendidikanID',
            'jenjangPendidikanNama:ntext',
            'jenjangPendidikanStatus:ntext',
        ],
    ]) ?>

</div>
