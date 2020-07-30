<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$theme = $this->theme;
$this->title = Yii::$app->name;
?>

<main class="body-container__main main-page">
  <section class="intro">
    <div class="container">
      <h1 class="intro__title">
        Freelance bot
      </h1>
      <div class="intro__desc-box">
        <p class="intro__desc">
          все заказы с фриланс бирж
          <span class="intro__desc-line">в&nbsp;одном&nbsp;месте</span>
        </p>
      </div>
      <a class="site-button site-button--yellow intro__button" href="<?= Url::toRoute(['site/signup']) ?>">
        Попробовать бесплатно
      </a>
    </div>
  </section>

  <section class="useful" id="useful">
    <div class="container useful__container">
      <div class="useful__image">
        <img
            alt="iphone"
            height="826px"
            src="<?= $theme->getUrl('img/static/useful-iphone@1x.png') ?>"
            srcset="<?= $theme->getUrl('img/static/useful-iphone@2x.png 2x') ?>"
            width="518px"
        />
      </div>
      <div class="useful__info">
        <h2 class="section-title useful__title">
          Чем полезен freelance bot?
        </h2>
        <p class="section-desc useful__title">
          Благодаря единой ленте чат-бота в Telegram, можно быстро вылавливать из
          общей массы интересующие заказы и оперативно откликаться на них, повышая
          свои шансы взять заказ
        </p>
        <a class="site-button useful__button" href="<?= Url::toRoute(['site/signup']) ?>">
          Начать бесплатный период
        </a>
      </div>
    </div>
  </section>
  <section class="suitable" id="suitable">
    <div class="container suitable__container">
      <h2 class="section-title suitable__title">
        Кому подходит сервис?
      </h2>
      <ul class="suitable__card-list">
        <li class="suitable__card">
          <img
              alt="card"
              class="suitable__card-img"
              src="<?= $theme->getUrl('img/static/suitable-card-1.svg') ?>"
          />
          <p class="suitable__card-text">
            Фрилансерам
          </p>
        </li>
        <li class="suitable__card">
          <p class="suitable__card-text-bg">Freelance</p>
          <img
              alt="card"
              class="suitable__card-img"
              src="<?= $theme->getUrl('img/static/suitable-card-2.svg') ?>"
          />
          <p class="suitable__card-text">
            IT-компаниям и Web-студиям
          </p>
        </li>
      </ul>
    </div>
  </section>

  <section class="how">
    <div class="container">
      <h2 class="section-title section-title--white how__title">
        Как это работает?
      </h2>
      <p class="section-desc section-desc--white how__desc">
        От первых успешных проектов вас отделяет всего несколько минут
      </p>
      <ul class="how__list">
        <li class="how__item">
          <div class="how__item-info">
            <h3 class="how__item-title">
              Выберите тариф
            </h3>
            <p class="how__item-desc">
              И получите день доступа в подарок!
            </p>
          </div>
          <div class="how__item-img">
            <img
                alt="tarif"
                src="<?= $theme->getUrl('img/static/how-img@1x.jpg') ?>"
                srcset="<?= $theme->getUrl('img/static/how-img@2x.jpg 2x') ?>"
                width="348px"
            />
          </div>
        </li>
        <li class="how__item">
          <div class="how__item-info">
            <h3 class="how__item-title">
              Подключитесь к боту Telegram
            </h3>
            <p class="how__item-desc">
              Вся информация о заявках с бирж в одном месте
            </p>
          </div>
          <div class="how__item-img">
            <img
                alt="tarif"
                src="<?= $theme->getUrl('img/static/how-img@1x.jpg') ?>"
                srcset="<?= $theme->getUrl('img/static/how-img@2x.jpg 2x') ?>"
                width="348px"
            />
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="tarif" id="tarif">
    <div class="container">
      <h2 class="section-title tarif__title">
        Тарифы
      </h2>
      <p class="section-desc tarif__desc">
        Регистрируйтесь сейчас и получите день бесплатного доступа
      </p>
        <?=\frontend\widgets\Rates::widget(); ?>
    </div>
  </section>


</main>
