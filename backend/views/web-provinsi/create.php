<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebProvinsi */

$this->title = 'Create Web Provinsi';
$this->params['breadcrumbs'][] = ['label' => 'Web Provinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-provinsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
