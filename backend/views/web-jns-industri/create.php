<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebJnsIndustri */

$this->title = Yii::t('app', 'Tambah Jenis Industri');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Industri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jns-industri-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
