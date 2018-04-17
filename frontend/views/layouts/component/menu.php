<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 15/03/2018
 * Time: 11.29
 */
use yii\helpers\Url;

?>
<ul class="menu vertical" data-accordion-menu>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site') ?>" <?php if(isset($this->params['index'])){ echo 'class="active"'; } ?>>Home</a>
        </li>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site/lowongan') ?>" <?php if(isset($this->params['lowongan'])){ echo 'class="active"'; } ?>>Lowongan</a>
        </li>
        <li>
            <a href="<?= Yii::$app->urlManager->createUrl('site/event') ?>" <?php if(isset($this->params['events'])){ echo 'class="active"'; } ?>>Events</a>
        </li>
        <?php

            $d0 = \common\models\WebKategoriArtikel\WebKategoriArtikel::find()->where(['kategoriArtikelStatus' => 'Aktif'])->all();
            foreach($d0 AS $d0Data){
                ?>
                <li>
                    <a href="?r=site/post&kategori=<?=$d0Data->kategoriArtikelID ?>" <?php if(isset($this->params[$d0Data->kategoriArtikelID])){ echo 'class="active"'; } ?>><?= $d0Data->kategoriArtikelNama ?></a>
                </li>
                <?php
            }

        ?>
<li>
    <a href="<?= Yii::$app->urlManager->createUrl('site/developer') ?>" <?php if(isset($this->params['developer'])){ echo 'class="active"'; } ?>>Developer</a>
</li>
<?php
if (!Yii::$app->user->isGuest) {
    ?>
    <li class="has-submenu">
        <a href="#0" <?php if(isset($this->params['user'])){ echo 'class="active"'; } ?>>@<?= Yii::$app->user->identity->username ?></a>
        <ul class="submenu menu vertical <?php if(isset($this->params['user'])){ echo 'is-active'; } ?>" data-submenu>
            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard') ?>" <?php if(isset($this->params['dashboard'])){ echo 'class="active"'; } ?>>Dashboard</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl('dashboard/profile') ?>" <?php if(isset($this->params['profile'])){ echo 'class="active"'; } ?>>Profil</a></li>
        </ul>
    </li>
    <li><a href="<?= Url::to(['site/logout']) ?>"><i class="fa fa-power-off"></i> Logout</a></li>
    <?php
} else {
    ?>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>" <?php if(isset($this->params['login'])){ echo 'class="active"'; } ?>>Login</a>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('site/register') ?>" <?php if(isset($this->params['register'])){ echo 'class="active"'; } ?>>Register</a>
    </li>
    <?php
}
?>
</ul>