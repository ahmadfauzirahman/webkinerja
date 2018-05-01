<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebHasilSeleksi */

$this->title = $model->hasilSeleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Hasil Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-hasil-seleksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hasilSeleksiID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hasilSeleksiID], [
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
            'hasilSeleksiID',
            'hasilSeleksiSeleksiID',
            'hasilSeleksiUserID',
            'hasilSeleksiLamaranID',
            'hasilSeleksiHasil:ntext',
            'hasilSeleksiKeterangan:ntext',
            'hasilSeleksiStatus:ntext',
        ],
    ]) ?>

</div>
