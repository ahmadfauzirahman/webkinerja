<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebJurusan */

$this->title = 'Create Web Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Web Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jurusan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
