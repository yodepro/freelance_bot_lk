<?php
use yii\helpers\Html;
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


        <?= Html::a('Что такое фриланс бот?',
                    ['site/index','#' => 'useful'],
                    ['class' => 'link-hover footer__item scrollFrom-useful--footer'])
        ?>
        <?= Html::a('Для кого он подойдет?',
                    ['site/index','#' => 'suitable'],
                    ['class' => 'link-hover footer__item scrollFrom-suitable--footer'])
        ?>
        <?= Html::a('Поддерживаемые биржи',
                    ['site/index','#' => 'suitable'],
                    ['class' => 'link-hover footer__item scrollFrom-suitable--footer'])
        ?>
<!--        Html::a('Преимущества',
                    ['site/index','#' => 'suitable'],
                    ['class' => 'link-hover footer__item scrollFrom-suitable--footer'])
        -->
        <?= Html::a('Тарифы',
                    ['site/index','#' => 'tarif'],
                    ['class' => 'footer__item scrollFrom-tarif--footer'])
        ?>
        <?= Html::a('Публичная оферта',
                    ['site/public'],
                    ['class' => 'footer__item'])
        ?>

    </nav>
    <p class="footer__and">
      &
    </p>
    <div class="footer__contact">
      <p class="footer__title">
        Свяжитесь с нами
      </p>
      <a class="link-hover footer__item" href="email:info@yode.pro">
        info@yode.pro
      </a>
      <a class="link-hover footer__item" href="tel:84991130149">
        +7 (499) 113 01 49
      </a>
    </div>
  </div>
</footer>
