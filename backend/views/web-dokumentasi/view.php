<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebDokumentasi */

$this->title = $model->dokumentasiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Dokumentasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-dokumentasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dokumentasiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dokumentasiID], [
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
            'dokumentasiID',
            'dokumentasiEventsID',
            'DokumentasiFoto:ntext',
        ],
    ]) ?>

</div>
