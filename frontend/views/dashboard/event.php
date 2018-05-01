<?php
use yii\widgets\Breadcrumbs;

$this->title = "Tiket Event";
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<a href="<?= Yii::$app->urlManager->createUrl(['dashboard/tiket', 'id'=>$model->eventsID]) ?>" target="_blank">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $model->eventsThumbnails;?>" alt="">
</a>

