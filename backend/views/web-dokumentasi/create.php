<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebDokumentasi */

$this->title = 'Tambah Dokumentasi';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = ['label' => 'Dokumentasi Event', 'url' => ['index', 'id'=>$event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-dokumentasi-create">


    <?= $this->render('_form', [
        'model' => $model,
        'id' => $event->eventsID
    ]) ?>

</div>
