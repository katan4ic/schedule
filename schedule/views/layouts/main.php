<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="stylesheet" href="<?= Yii::$app->basePath ?>/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Расписанер</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Расписанер',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'API', 'url' => ['/site/api']],
            ['label' => 'Приложение', 'url' => ['/phone/index']],
            ['label' => 'Админка', 'url' => ['admin/default/index']],
            ['label' => 'Вход', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Регистрация', 'url' => ['/site/register'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Димас <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
