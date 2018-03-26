<?php
use yii\widgets\Breadcrumbs;

$this->title = "Dashboard";
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadcrumb','style' => 'background:#ffffff; border-bottom: 1px solid #f5f5f5; border-radius:0; margin-left:0; margin-right:0; padding:8px 0']
]) ?>
<h3 class="el-title"><?= $data = "Welcome back " . Yii::$app->user->identity->nama; ?></h3>
