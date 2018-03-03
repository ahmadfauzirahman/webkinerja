<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebEvents */

$this->title = 'Tambah Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-events-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
