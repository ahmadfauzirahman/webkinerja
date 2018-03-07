<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebVenue */

$this->title = 'Tambah Venue';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Venue', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-venue-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
