<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 11/03/2018
 * Time: 15.26
 */
$model = \backend\models\User::findOne(Yii::$app->user->identity->userID);
?>
<?= $this->render('profile_form', [
    'model' => $model,
]) ?>