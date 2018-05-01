<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebSeleksi */

$this->title = 'Create Web Seleksi';
$this->params['breadcrumbs'][] = ['label' => 'Web Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-seleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
