<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebArtikel\WebArtikel */

//$this->title = $model->artikelJudul;
$this->params['breadcrumbs'][] = ['label' => 'Web Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-artikel-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->artikelID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->artikelID], [
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
            'artikelID',
            'artikelKategoriID',
            'artikelUserID',
            'artikelJudul:ntext',
//            [
//              'label' => 'artikelIsi',
//                'value' => function($model){
//                    return substr($model->artikelIsi,0,100).'...';
//                },
//                'format' => 'html',
//            ],
            [
                'label' => 'artikelThumbnails',
                'format' => 'raw',
                'value' => '<button type="button" class="btn btn-default"
            data-toggle="modal"
            data-target="#foto-' . $model->artikelID . '"><img src="thumbnails/' . $model->artikelThumbnails . '" width="30px" height="30px"/></button>

<div class="modal fade " id="foto-' . $model->artikelID . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center" id="exampleModalLabel">' . $model->artikelThumbnails . '</h2>
      </div>
      <div class="modal-body text-center">
            <img src="thumbnails/' . $model->artikelThumbnails . '" width="800px"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
',
            ],
            'artikelTglPost',
            'artikeReader',
            'artikelStatus:ntext',
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-12">
    <?=
        $model->artikelIsi;
    ?>
        </div>
    </div>

</div>
