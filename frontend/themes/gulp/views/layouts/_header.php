<?php
$theme = $this->theme;
?>

<header class="header">
  <div class="container header__container">
    <a class="header__logo" href="./">
      <img
          alt="FreelanceBot"
          height="48px"
          src="<?= $theme->getUrl('img/static/logo.svg') ?>"
          width="223px"
      />
    </a>
    <div class="header__burger-menu">
      <nav class="header__nav">
        <a class="link-hover header__nav-item scrollFrom-useful" href="#useful">
          Что это?
        </a>
        <a
            class="link-hover header__nav-item scrollFrom-suitable"
            href="#suitable"
        >
          Для кого?
        </a>
        <a class="link-hover header__nav-item" href="#">
          Биржи
        </a>
        <a class="link-hover header__nav-item" href="#">
          Преимущества
        </a>
        <a class="link-hover header__nav-item scrollFrom-tarif" href="#tarif">
          Тарифы
        </a>
        <a
            class="site-button header__button site-button header__button--mobile"
            href="<?= \yii\helpers\Url::toRoute(['site/login'])?>"
        >
          Войти
        </a>
      </nav>
    </div>
    <a class="site-button header__button" href="<?= \yii\helpers\Url::toRoute(['site/login'])?>">
      Попробовать бесплатно
    </a>
    <button class="header__burger-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>
