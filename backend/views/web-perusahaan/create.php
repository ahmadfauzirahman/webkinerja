<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebPerusahaan */

$this->title = 'Create Web Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Web Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
