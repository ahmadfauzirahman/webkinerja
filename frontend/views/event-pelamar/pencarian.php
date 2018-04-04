<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 2:42 PM
 */
?>

<br><br>

<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:50px;padding-bottom: 20px;
    ">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Lowongan Berdasarkan Jurusan" style="height: 50px">
                <div class="input-group-btn">
                    <button class="btn btn-success" type="submit" style="height: 50px; width: 50px">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50" style="background: white">
        <h2>lowongan</h2>
    </div>
</div>
