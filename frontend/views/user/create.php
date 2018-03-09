<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<!-- contact support -->
<div class="section  p-b-60 p-t-60" id="developer" style="background: url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png') no-repeat; box-shadow: 0px -10px 20px -5px inset #eeeeee;">
    <div class="row">
        <div class="large-12 large-centered column">
            <div class="user-create">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
