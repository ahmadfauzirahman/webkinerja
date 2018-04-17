<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebUserPremium */

$this->title = $model->userPremiumID;
$this->params['breadcrumbs'][] = ['label' => 'Web User Premium', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userPremiumID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userPremiumID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userPremiumID',
            'userID',
            'userPremiumAwal',
            'userPremiumAkhir',
            'userPremiumKeterangan:ntext',
            'userPremiumStatus:ntext',
        ],
    ]) ?>

</div>
