<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="navbar-brand"><a href="<?=Url::toRoute('/site')?>"><img class="img-responsive" src="/images/logo.png" alt="logo"></a></div>

                <div class="username navbar-form navbar-right ">
                    <?php if (!Yii::$app->user->isGuest):?>
                    <?= Html::beginForm(['profile/logout'],'post');?>
                        <?= Html::submitButton('Выход ('.Yii::$app->user->identity->firstname.')',['type'=>'submit'])?>
                    <?= Html::endForm();?>
                    <?php endif;?>
                </div>
                <form class="navbar-form navbar-right hidden-sm hidden-xs">
                    <div class="form-group">
                        <i class="icon ion-android-search"></i>
                        <input type="text" class="form-control" placeholder="Поиск друзей...">
                    </div>
                </form>

            </div>
        </div>
    </header>

    <?= $content ?>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-wrapper">
                    <div class="col-md-3 col-sm-3">
                        <a href=""><img src="/images/logo3.png" alt="logo_footer" class="footer-logo img-responsive" /></a>
                        <ul class="list-inline social-icons">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h5>For individuals</h5>
                        <ul class="footer-links">
                            <li><a href="">Signup</a></li>
                            <li><a href="">login</a></li>
                            <li><a href="">Explore</a></li>
                            <li><a href="">Finder app</a></li>
                            <li><a href="">Features</a></li>
                            <li><a href="">Language settings</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h5>For businesses</h5>
                        <ul class="footer-links">
                            <li><a href="">Business signup</a></li>
                            <li><a href="">Business login</a></li>
                            <li><a href="">Benefits</a></li>
                            <li><a href="">Resources</a></li>
                            <li><a href="">Advertise</a></li>
                            <li><a href="">Setup</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h5>About</h5>
                        <ul class="footer-links">
                            <li><a href="">About us</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms</a></li>
                            <li><a href="">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <h5>Contact Us</h5>
                        <ul class="contact">
                            <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                            <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                            <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Marchenko Anatoliy © 2017. All rights reserved</p>
        </div>
    </footer>
    <!--dockpanel-->
    <div class="dock-panel-place">
        <ul class="dock-panel">
            <li class="icon ion-ios-film"></li>
            <li class="icon ion-android-contacts"></li>
            <li class="icon ion-android-person-add"></li>
            <li class="icon ion-android-chat"></li>
            <li class="icon ion-images"></li>
            <li class="icon ion-videocamera"></li>
            <div class="clear"></div>
        </ul>
    </div>
    <!--preloader-->
    <div id="spinner-wrapper">
        <div class="spinner"></div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
