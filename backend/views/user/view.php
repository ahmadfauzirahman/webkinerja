<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengguna'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php if (\common\auth\Auth::getRole() == 'admin') { ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-pencil"></i> Update'), ['update', 'id' => $model->userID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-trash"></i> Delete'), ['delete', 'id' => $model->userID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userID',
            'username',
            'password',
            'nama',

            'email:email',
            'telepon',
            'role',
            [
                'label' => 'foto',
                'format' => 'raw',
                'value' => '<button type="button" class="btn btn-default"
            data-toggle="modal"
            data-target="#foto-' . $model->userID . '"><img src="foto/' . $model->foto . '" width="30px" height="30px"/></button>

<div class="modal fade " id="foto-' . $model->userID . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center" id="exampleModalLabel">' . $model->nama . '</h2>
      </div>
      <div class="modal-body text-center">
            <img src="foto/' . $model->foto . '" width="800px"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
',
            ],
        ],
    ]) ?>

</div>
