<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremium */

$this->title = 'Update Web User Premium: ' . $model->userPremiumID;
$this->params['breadcrumbs'][] = ['label' => 'Web User Premium', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userPremiumID, 'url' => ['view', 'id' => $model->userPremiumID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-user-premium-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
