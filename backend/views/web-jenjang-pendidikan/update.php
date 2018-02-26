<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebJenjangPendidikan */

$this->title = 'Update Jenjang Pendidikan: ' . $model->jenjangPendidikanNama;
$this->params['breadcrumbs'][] = ['label' => 'Jenjang Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenjangPendidikanNama, 'url' => ['view', 'id' => $model->jenjangPendidikanNama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-jenjang-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
