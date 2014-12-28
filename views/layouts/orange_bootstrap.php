<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\components\CartWidget;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container"> <!-- Global container -->

    <div class="header"> <!-- Header -->
        <div class="col-md-6 col-sm-6 col-xs-6">
            <img src="/images/logo.png"><br>
            <a href="http://nure.ua/" target="_blank" class="nure-link"><?=Yii::t('app','Kharkiv National University of Radioelectronics')?></a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 text-right contacts">
            <p><?=Yii::t('app','61166, Ukraine, Kharkiv')?> </p><p>  <?=Yii::t('app','av. Lenin, 14')?> </p><p> <?=Yii::t('app','main build., cab. 372')?> </p><p>(057) 702-16-46</p>
            <p><a href="mailto:mywork@kture.kharkov.ua"> mywork@kture.kharkov.ua</a></p>
            <p> <a href="mailto:yarmarka.kture@gmail.com">yarmarka.kture@gmail.com</a></p>
        </div>
        <div class="clearfix">
        </div>
    </div> <!-- Header -->

    <div> <!-- Menu -->
    <nav class="navbar navbar-orange" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/"><?=Yii::t('yii','Home')?></a></li>
            <li><a href="#"><?=Yii::t('app','About us')?></a></li>
            <li><a href="#"><?=Yii::t('app','News')?></a></li>
            <li><a href="#"><?=Yii::t('app','Job offers')?></a></li>
            <li><a href="#"><?=Yii::t('app','Resumes')?></a></li>
            <li><a href="#"><?=Yii::t('app','Courses')?></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <?php 
            if (Yii::$app->user->isGuest) {
            ?>
                <li><a href="<?=Url::to(['site/login'])?>"><?=Yii::t('app','Log in')?></a></li>
                <li><a href="<?=Url::to(['site/registration'])?>"><?=Yii::t('app','Registration')?></a></li>
            <?php
            } else {
            ?>
                <li><a href="<?=Url::to(['user/account'])?>"><?=Yii::t('app','Account')?></a></li>
                <li><a href="<?=Url::to(['site/logout'])?>" data-method="post"><?=Yii::t('app','Logout')?></a></li>
            <?php
            }
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=Yii::t('app','Language')?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/lang?lang=ru-RU&link=<?=Url::to()?>"><?=Yii::t('app','Русский')?></a></li>
                <li><a href="/lang?lang=uk&link=<?=Url::to()?>"><?=Yii::t('app','Українська')?></a></li>
                <li><a href="/lang?lang=en-US&link=<?=Url::to()?>"><?=Yii::t('app','English')?></a></li>
              </ul>
            </li>
          </ul>
    </nav>
    </div> <!-- Menu -->

    <div class=""> <!-- Main content -->

    <?=$content?>

    </div> <!-- Main content -->
    <hr>
    <div class=""> <!-- Sponsors -->
        <div class="text-center sponsors-heading"><?=Yii::t('app','Our sponsors and partners')?></div>
        <div class="text-center sponsors-items">
            <a href=""><img src="/images/globallogic.png"></a>
            <a href=""><img src="/images/nix.png"></a>
            <a href=""><img src="/images/miratech.png"></a>
            <a href=""><img src="/images/workkharkiv.png"></a>
            <a href=""><img src="/images/employmentcenter.png"></a>
        </div>
    </div> <!-- Sponsors -->

    <div class="footer col-md-12"> <!-- Footer -->
        <div class="col-md-9 col-sm-12"> <!-- Menus -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-menu">
                <h3 class="block-heading">Документы</h3>
                <ul>
                    <li><a href="">Инфо</a></li>
                    <li><a href="">Блаблабла</a></li>
                    <li><a href="">Блалбалабалала</a></li>
                    <li><a href="">Блааа</a></li>
                    <li><a href="">балалл</a></li>
                    <li><a href="">бвллвлв</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-menu">
                <h3 class="block-heading">Документы</h3>
                <ul>
                    <li><a href="">Инфо</a></li>
                    <li><a href="">Блаблабла</a></li>
                    <li><a href="">Блалбалабалала</a></li>
                    <li><a href="">Блааа</a></li>
                    <li><a href="">балалл</a></li>
                    <li><a href="">бвллвлв</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-menu">
                <h3 class="block-heading">Документы</h3>
                <ul>
                    <li><a href="">Инфо</a></li>
                    <li><a href="">Блаблабла</a></li>
                    <li><a href="">Блалбалабалала</a></li>
                    <li><a href="">Блааа</a></li>
                    <li><a href="">балалл</a></li>
                    <li><a href="">бвллвлв</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-menu">
                <h3 class="block-heading">Документы</h3>
                <ul>
                    <li><a href="">Инфо</a></li>
                    <li><a href="">Блаблабла</a></li>
                    <li><a href="">Блалбалабалала</a></li>
                    <li><a href="">Блааа</a></li>
                    <li><a href="">балалл</a></li>
                    <li><a href="">бвллвлв</a></li>
                </ul>
            </div>
        </div> <!-- Menus -->

        <div class="col-md-3 col-sm-12 footer-contacts"> <!-- Contact info -->
            <div class="col-md-12 col-sm-6 col-xs-6" style="padding:0;">
            <div class="col-md-2 icon"><span class="glyphicon glyphicon-home"></span></div><div class="contacts col-md-10"> <br><p> <?=Yii::t('app','61166, Ukraine, Kharkiv')?> </p><p> <?=Yii::t('app','av. Lenin, 14')?> </p><p><?=Yii::t('app','main build., cab. 372')?></p><p> (057) 702-16-46</p></div>
            <div class="clearfix" style="padding-bottom:5px;"></div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-6" style="padding:0;">
            <div class="col-md-2 icon"><span class="glyphicon glyphicon-envelope"></span></div><div class="contacts col-md-10"><br><p><a href="mailto:mywork@kture.kharkov.ua"> mywork@kture.kharkov.ua</a></p>
               <p> <a href="mailto:yarmarka.kture@gmail.com">yarmarka.kture@gmail.com</a></p></div>
               <div class="clearfix"></div>
            </div>
            <br>
            <div class="pull-right" style="padding-top:15px; font-size: 13pt;"><?=Yii::t('app','IC Career')?> © <?= date('Y') ?> </div>
        </div> <!-- Contact info -->
        <div class="clearfix"></div>
    </div> <!-- Footer -->
    <div class="clearfix"></div>

</div> <!-- Global container -->

<?php $this->endBody() ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="/js/slides.min.js"></script>
<script>
    $(document).ready(function() {
      $('#slides').slidesjs({
        width: 900,
        height: 400,
        navigation: {
          active: false,
          effect: "fade"
        },
        pagination: {
          active: false,
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 400
          }
        }
      });
    });
    $(function(){
        $(".slidesjs-container").css('float','left');
        $(".slidesjs-container").css('margin-left','5px');
        $(".slidesjs-container").css('margin-right','5px');
    });
</script>
</body>
</html>
<?php $this->endPage() ?>