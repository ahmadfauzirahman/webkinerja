<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebKota */

$this->title = 'Create Web Kota';
$this->params['breadcrumbs'][] = ['label' => 'Web Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
