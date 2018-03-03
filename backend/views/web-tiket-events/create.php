<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebTiketEvents */

$this->title = 'Create Web Tiket Events';
$this->params['breadcrumbs'][] = ['label' => 'Web Tiket Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-tiket-events-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
