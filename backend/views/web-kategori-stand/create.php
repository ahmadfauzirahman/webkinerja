<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebKategoriStand */

$this->title = Yii::t('app', 'Tambah Kategori Stand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori Stand'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-kategori-stand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
