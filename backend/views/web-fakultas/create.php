<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebFakultas */

$this->title = 'Create Web Fakultas';
$this->params['breadcrumbs'][] = ['label' => 'Web Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-fakultas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
