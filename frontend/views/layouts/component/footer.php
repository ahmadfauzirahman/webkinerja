<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 15/03/2018
 * Time: 11.33
 */
?>
<footer class="section footer p-t-30 p-b-30 bg--dark" id="contact">
        <div class="row">
            <div class="large-5 small-12 column">
                <div class="block-widget">
                    <div class="block-widget_header">
                    </div>
                    <div class="block-widget_content">
                        <p>
                            <figure class="logo-footer">
                                <img src="<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/uin.png" style="height:60px; margin: 6px;">
                            </figure>
                        </p>
                        <p>We have worked with a wide range of companies, from Fortune 500s with major international presences to startup
                            businesses with highly focused local clientele. We strive to collaborate with like-minded businesses to make
                            a difference environmentally and socially. Let’s collaborate.</p>
                    </div>
                </div>
            </div>
            <div class="large-6 small-12 column large-right">
                <div class="block-partner hide-for-small-only">
                    <ul class="block-partner_list vertical large-horizontal medium-horizontal menu">

                        <li class="block-partner_list-item">
                            <h4>Facebook</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Google</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Paypal</h4>
                            <span>Partner</span>
                        </li>

                        <li class="block-partner_list-item">
                            <h4>Top Agency</h4>
                            <span>2016-2020</span>
                        </li>

                    </ul>
                </div>
                <div class="block-newsletter">
                    <h4>Subscribe to our Newsletter</h4>
                    <form>
                        <div class="input-group">
                            <input class="input-group-field field-text" type="email" placeholder="Your email address">
                            <div class="input-group-button">
                                <input type="submit" class="button -rounded" value="Subscribe">
                            </div>
                        </div>
                    </form>
                    <p class="text-small">Learn About our company at
<a href="#"><?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteTitle']); ?></a> | Join with our company:
<a href="#">Career</a>
</p>
</div>
</div>
</div>
<div class="row">
    <div class="large-12 column">
        <div class="footer-bottom">
            <div class="footer-copyright float-left">
                &copy; copyright <?= date('Y') ?> - <?= strtoupper(\common\models\WebSetting::find()->orderBy(['settingID' => SORT_ASC])->limit(1)->all()[0]['settingSiteTitle']); ?>
            </div>
            <div class="footer-nav_icon float-right">
                <ul class="menu horizontal">
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-nav float-right hide-for-small-only">
                <ul class="menu horizontal">
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">About us</a>
                    </li>
                    <li>
                        <a href="">Service</a>
                    </li>
                    <li>
                        <a href="">Cases</a>
                    </li>
                    <li>
                        <a href="">News Page</a>
                    </li>
                    <li>
                        <a href="">Shop</a>
                    </li>
                    <li>
                        <a href="">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- end footer-->