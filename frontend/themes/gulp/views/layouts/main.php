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
  <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
  />
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  />
  <link
      rel="shortcut icon"
      href="<?= $theme->getUrl('img/favicons/favicon.ico') ?>"
      type="image/x-icon"
  />
  <link
      rel="icon"
      sizes="16x16"
      href="<?= $theme->getUrl('img/favicons/favicon-16x16.png') ?>"
      type="image/png"
  />
  <link
      rel="icon"
      sizes="32x32"
      href="<?= $theme->getUrl('img/favicons/favicon-32x32.png') ?>"
      type="image/png"
  />
  <link
      rel="apple-touch-icon-precomposed"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-precomposed.png') ?>"
  />
  <link rel="apple-touch-icon" href="<?= $theme->getUrl('img/favicons/apple-touch-icon.png') ?>"/>
  <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-57x57.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-60x60.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-72x72.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-76x76.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-114x114.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-120x120.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-144x144.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-152x152.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="167x167"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-167x167.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-180x180.png') ?>"
  />
  <link
      rel="apple-touch-icon"
      sizes="1024x1024"
      href="<?= $theme->getUrl('img/favicons/apple-touch-icon-1024x1024.png') ?>"
  />
    <?php
    $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>


<div class="body-container">
  <div class="burger-overflow"></div>
    <?= $this->render('_header') ?>
    <?= $content ?>
    <?= $this->render('_footer') ?>
</div>

<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
