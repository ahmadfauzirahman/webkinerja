<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebHasilSeleksi */

$this->title = 'Update Web Hasil Seleksi: ' . $model->hasilSeleksiID;
$this->params['breadcrumbs'][] = ['label' => 'Web Hasil Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hasilSeleksiID, 'url' => ['view', 'id' => $model->hasilSeleksiID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-hasil-seleksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
