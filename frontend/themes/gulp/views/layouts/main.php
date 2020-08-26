<?php

/* @var $this View */

/* @var $content string */

use frontend\assets\GulpAsset;
use yii\helpers\Html;
use yii\web\View;

GulpAsset::register($this);
$theme = $this->theme;
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#fff"/>
  <meta name="verification" content="ef46cc3a76521696159b7adb10f359" />
  <meta name="google-site-verification" content="rVpvz2YYo-93AlE0k85RhVycEJ8ieAEoim7vXZqrMaY" />
  <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
  />
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

    <?php
    $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>
<?=

\lo\modules\noty\Wrapper::widget([
    'layerClass' => lo\modules\noty\layers\Noty::class,
    //'layerClass' => lo\modules\noty\layers\Growl::class,
    'options'=> [
       'layout' => 'topRight',
        'theme' => 'metroui',
        'progressBar' => true,
        'animation' => [
            'open' => 'animated fadeInRight',
            'close' => 'animated fadeOutRight'
        ]
    ],
    'layerOptions'=>
    [
       'showTitle'=>false,
        'registerAnimateCss' => true,
    ]]);
?>

<div class="body-container">
  <div class="burger-overflow"></div>
    <?= $this->render('_header') ?>
    <?= $content ?>
    <?= $this->render('_footer') ?>
</div>

<?php
echo $this->render('_ya_metrika');
$this->endBody()
?>
</body>
</html>
<?php
$this->endPage() ?>
