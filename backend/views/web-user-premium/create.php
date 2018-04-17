<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremium */

$this->title = 'Create Web User Premium';
$this->params['breadcrumbs'][] = ['label' => 'Web User Premia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
