<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikel */

$this->title = 'Create Web Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Web Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
