<div class="section text-center" style="padding: 40px 0">
    <h2 class="el-title">TIKET <?= $event->eventsJudul?></h2>
    <h3 class="el-title"><?= date('d', strtotime($event->eventsTanggalMulai))." - ". date('d F Y', strtotime($event->eventsTanggalSelesai))?></h3>
    <div class="divider"></div>
    <div class="row" style="margin-top: 50px; border: 1px solid whitesmoke; padding: 10px">
        <a href="#" class="btn btn-success" style="display: block;width: max-content"><i class="fa fa-download"></i></a>
        <div class="large-6 column">
            <?php if(Yii::$app->user->identity->foto == ''){ ?>
                <img  style="width: 320px; height: 320px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/avatar.png" alt="avatar">
            <?php } else { ?>
                <img  style="width: 320px; height: 320px;" src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto/<?= Yii::$app->user->identity->foto; ?>" alt="avatar">
            <?php } ?>
        </div>
        <div class="large-6 column">
            <img src="<?= Yii::$app->request->baseUrl."/qrcode/".Yii::$app->user->identity->username.".png" ?>" alt="">
        </div>

    </div>
    <p class="alert alert-warning" style="margin-top: 10px">tiket wajib ditunjukkan pada saat memasuki lokasi Job Fair</p>
</div>
