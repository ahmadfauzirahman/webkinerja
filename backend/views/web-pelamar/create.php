<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebPelamar */

$this->title = 'Create Web Pelamar';
$this->params['breadcrumbs'][] = ['label' => 'Web Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-pelamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
