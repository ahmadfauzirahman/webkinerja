<div class="section text-center" style="padding: 40px 0">
    <h2 class="el-title">TIKET <?= $event->eventsJudul?></h2>
    <div class="divider"></div>
    <div class="row" style="padding-top: 50px">
        <div class="large-6 column">
            foto_pelamar
        </div>
        <div class="large-6 column">
            <img src="<?= Yii::$app->request->baseUrl."/qrcode/".Yii::$app->user->identity->username.".png" ?>" alt="">
        </div>
    </div>
</div>
