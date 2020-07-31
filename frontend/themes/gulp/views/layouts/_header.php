<?php

use yii\helpers\Html;
use yii\helpers\Url;

$theme = $this->theme;
?>

<header class="header">
  <div class="container header__container">
      <?=
      Html::a(
          Html::img(
              $theme->getUrl('img/static/logo.svg'),
              [
                  'alt' => 'FreelanceBot',
                  'height' => '48px', 'width' => '223px'
              ]
          ),
          ['site/index'],
          ['class' => 'header__logo']
      )
      ?>
    <div class="header__burger-menu">
      <nav class="header__nav">
          <?= Html::a('Что это?',
                      ['site/index','#' => 'useful'],
                      ['class' => 'link-hover header__nav-item scrollFrom-useful'])
          ?>
          <?= Html::a('Для кого?',
                      ['site/index','#' => 'suitable'],
                      ['class' => 'link-hover header__nav-item scrollFrom-suitable'])
          ?>
          <?= Html::a('Биржи',
                      ['site/base'],
                      ['class' => 'link-hover header__nav-item'])
          ?>
          <!-- Html::a('Преимущества',
                      ['site/index','#' => 'suitable'],
                      ['class' => 'link-hover header__nav-item scrollFrom-how'])-->

          <?= Html::a('Тарифы',
                      ['site/index','#' => 'tarif'],
                      ['class' => 'link-hover header__nav-item scrollFrom-tarif'])
          ?>

          <?= Html::a('Войти',
                      ['site/login'],
                      ['class' => 'site-button header__button site-button header__button--mobile'])
          ?>
      </nav>
    </div>
      <?php if(Yii::$app->user->isGuest): ?>
        <a class="site-button header__button" href="<?= Url::toRoute(['site/signup']) ?>">
          Попробовать бесплатно
        </a>
      <?php else: ?>
        <a class="site-button header__button" href="<?= Url::toRoute(['lk/index']) ?>">
          Личный кабинет
        </a>
      <?php endif; ?>

    <button class="header__burger-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>
