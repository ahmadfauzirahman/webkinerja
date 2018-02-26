<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebJenjangPendidikan */

$this->title = 'Update Web Jenjang Pendidikan: ' . $model->jenjangPendidikanID;
$this->params['breadcrumbs'][] = ['label' => 'Web Jenjang Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenjangPendidikanID, 'url' => ['view', 'id' => $model->jenjangPendidikanID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-jenjang-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
