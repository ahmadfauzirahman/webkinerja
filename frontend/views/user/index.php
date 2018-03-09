<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\User\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<!-- contact support -->
<div class="section  p-b-60 p-t-60" id="developer" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png') no-repeat; box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 large-centered column">

            <div class="user-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php Pjax::begin(); ?>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'userID',
                        'username',
                        'password',
                        'nama',
                        'email:email',
                        //'telepon',
                        //'foto:ntext',
                        //'tanggal_pendaftaran',
                        //'role',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>

        </div>
        <div class="clear"></div>
        <br>
    </div>
</div>
<!-- end contact support -->