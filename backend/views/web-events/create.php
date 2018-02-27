<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = 'Create Web Events';
$this->params['breadcrumbs'][] = ['label' => 'Web Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
