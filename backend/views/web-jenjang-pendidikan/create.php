<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebJenjangPendidikan */

$this->title = 'Create Web Jenjang Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Web Jenjang Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-jenjang-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
