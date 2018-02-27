<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikel */

$this->title = 'Update Web Artikel: ' . $model->artikelID;
$this->params['breadcrumbs'][] = ['label' => 'Web Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->artikelID, 'url' => ['view', 'id' => $model->artikelID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
