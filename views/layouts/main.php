<?php
use yii\helpers\Html;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Rabota KTURE',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menu = [];
            $admin_widget = [
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Yii::t('yii','Home'), 'url' => ['/']],
                    ['label' => 'User', 'url' => ['/admin/user/index']],
                    ['label' => 'Logout (' . Yii::$app->user->identity->name . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                    ],
            ];
            $company_widget = [
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Yii::t('yii','Home'), 'url' => ['/']],
                    ['label' => 'Logout company (' . Yii::$app->user->identity->name . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ];
            $student_widget = [
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Yii::t('yii','Home'), 'url' => ['/']],
                    ['label' => 'Logout student (' . Yii::$app->user->identity->name . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ];
            $guest_widget = [
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Yii::t('yii','Home'), 'url' => ['/']],
                    ['label' => Yii::t('app','Login'), 'url' => ['/site/login']],
                    ['label' => Yii::t('app','Registration'), 'url' => ['/site/registration']]
                ],
            ];

            if (Yii::$app->user->getIdentity()->role == User::ROLE_ADMIN)
                echo Nav::widget($admin_widget);
            elseif (Yii::$app->user->getIdentity()->role == User::ROLE_COMPANY)
                echo Nav::widget($company_widget);
            elseif (Yii::$app->user->getIdentity()->role == User::ROLE_STUDENT)
                echo Nav::widget($student_widget);
            else
                echo Nav::widget($guest_widget);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
