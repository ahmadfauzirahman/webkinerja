<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebHasilSeleksi */

$this->title = 'Create Web Hasil Seleksi';
$this->params['breadcrumbs'][] = ['label' => 'Web Hasil Seleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-hasil-seleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
