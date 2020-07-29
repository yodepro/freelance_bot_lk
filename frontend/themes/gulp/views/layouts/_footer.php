<?php
$theme = $this->theme;
?>

<footer class="footer">
  <div class="footer__line"></div>
  <div class="container footer__logo-container">
    <a class="footer__logo" href="./">
      <img alt="FreelanceBot" src="<?= $theme->getUrl('img/static/logo-w.svg') ?>"/>
    </a>
  </div>
  <div class="container footer__container">
    <nav class="footer__nav">
      <p class="footer__title">
        Разделы сайта
      </p>
      <a
          class="link-hover footer__item scrollFrom-useful--footer"
          href="#useful"
      >
        Что такое фриланс бот?
      </a>
      <a
          class="link-hover footer__item scrollFrom-suitable--footer"
          href="#suitable"
      >
        Для кого он подойдет?
      </a>
      <a class="link-hover footer__item" href="#">
        Поддерживаемые биржи
      </a>
      <a class="link-hover footer__item" href="#">
        Преимущества
      </a>
      <a class="link-hover footer__item scrollFrom-tarif--footer" href="#tarif">
        Тарифы
      </a>
    </nav>
    <p class="footer__and">
      &
    </p>
    <div class="footer__contact">
      <p class="footer__title">
        Свяжитесь с нами
      </p>
      <a class="link-hover footer__item" href="#">
        info@ikon.love
      </a>
      <a class="link-hover footer__item" href="#">
        (+41) 76 586 12 56
      </a>
    </div>
  </div>
</footer>
