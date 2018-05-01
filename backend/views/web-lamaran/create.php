<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebLamaran */

$this->title = 'Create Web Lamaran';
$this->params['breadcrumbs'][] = ['label' => 'Web Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-lamaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
