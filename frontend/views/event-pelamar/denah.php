<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/13/2018
 * Time: 2:09 PM
 */

$this->registerCssFile(Yii::$app->request->baseUrl."/css/denah.css");
?>
<br><br>
<div class="banner" style="width: 100%;">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails;?>" alt="">
</div>

<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:20px;padding-bottom: 10px;
    ">
    <div class="row">
        <h2 class="el-title">Denah <?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>

<div class="section" style="padding: 20px">
    <div class="row text-center">
        <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/ic.png" alt="" style="width: 880px;">

        <div class="kotak kiri A3 tersedia">
            <div class="my-popover-title" style="display:none;">
                <p>paltinum A3</p>
            </div>
            <div class="my-popover-content" style="display:none;">
                <a href="" class="btn btn-primary">Lihat fasilitas</a>
                <a href="" class="btn btn-primary">Book</a>
            </div>
        </div>

        <div class="kotak kiri A2 tesedia">
            <div class="my-popover-title" style="display:none;">
                <p>paltinum A2</p>
            </div>
            <div class="my-popover-content" style="display:none;">
                <a href="" class="btn btn-primary">Lihat fasilitas</a>
                <a href="" class="btn btn-primary">Book</a>
            </div>
        </div>

        <div class="kotak kiri A1 tersedia">
            <div class="my-popover-title" style="display:none;">
                <p>paltinum A1</p>
            </div>
            <div class="my-popover-content" style="display:none;">
                <a href="" class="btn btn-primary">Lihat fasilitas</a>
                <a href="" class="btn btn-primary">Book</a>
            </div>
        </div>

        <div class="kotak kanan A4 tersedia">
            <div class="my-popover-title" style="display:none;">
                <p>paltinum A4</p>
            </div>
            <div class="my-popover-content" style="display:none;">
                <a href="" class="btn btn-primary">Lihat fasilitas</a>
                <a href="" class="btn btn-primary">Book</a>
            </div>
        </div>
    </div>
    <div class="row">
        <hr>
        <h2 class="el-title">Daftar Perusahaan</h2>
        <div class="divider float-left"></div>
        <br>
        <h3 class="el-subtitle">PLATINUM</h3>
        <div class="divider float-left"></div>
    </div>
</div>


<?php

    $script = <<< JS
    jQuery.noConflict();
    $(document).ready(function () {
                   
                    $('.kotak').popover({
                        html : true,
                        trigger : 'manual',
                        placement : 'top',
                        animation: false,
                        title: function () {
                                return $(this).children('.my-popover-title').html();
                            },
                        content : function(){
                            return $(this).children('.my-popover-content').html();
                        }
                    }).on("mouseenter", function(){
                        var _this = this;
                        $(this).popover("show");
                        $(this).siblings(".popover").on("mouseleave", function () {
                                $(_this).popover('hide');
                            });
                    }).on("mouseleave", function () {
                            var _this = this;
                            setTimeout(function () {
                                if (!$(".popover:hover").length) {
                                    $(_this).popover("hide")
                                }
                            }, 100);
                        });

                   
                });
JS;
$this->registerJs($script);
?>
