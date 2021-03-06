<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebSetting */

$this->title = $model->settingSiteTitle;
$this->params['breadcrumbs'][] = ['label' => 'Web Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-setting-view">

<!--    <h1><?php //= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->settingID], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //Html::a('Delete', ['delete', 'id' => $model->settingID], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'settingID',
            'settingSiteTitle',
            'settingSiteDescription:ntext',
            'settingMetaKeyword:ntext',
            'settingCredits',
            'settingFoto',
            'settingTelepon',
            //'settingTicketEvent',
            [
                'attribute' => 'settingTicketEvent',
                'value' => function($model){
                    if($model->settingTicketEvent == 1){
                        return "Tampilkan";
                    } elseif($model->settingTicketEvent == 0){
                        return "Sembunyikan";
                    } else {
                        return "Undefined";
                    }
                }
            ],
            'settingPageGuide',
            'settingPagePeraturanKebijakan',
        ],
    ]) ?>

</div>
