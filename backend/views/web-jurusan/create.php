<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebJurusan */

$this->title = 'Tambah Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Tambah Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jurusan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
