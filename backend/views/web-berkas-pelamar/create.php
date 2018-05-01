<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebBerkasPelamar */

$this->title = 'Create Web Berkas Pelamar';
$this->params['breadcrumbs'][] = ['label' => 'Web Berkas Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-berkas-pelamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
