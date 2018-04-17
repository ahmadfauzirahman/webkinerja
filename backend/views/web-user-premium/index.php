<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebUserPremiumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web User Premium';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-premium-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Web User Premium', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'userPremiumID',
            'userID',
            'userPremiumAwal',
            'userPremiumAkhir',
            'userPremiumKeterangan:ntext',
            'userPremiumStatus:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
