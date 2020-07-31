<?php

declare(strict_types=1);
/* @var $this yii\web\View */

use common\models\PaymentRate;
use common\models\User;
use yii\helpers\Url;

/* @var $profile User */

$theme = $this->theme;
$this->title = 'Личный кабинет';
?>

<?= $this->render('_bread_crums') ?>
<section class="container profile-page profile-page--bot">
  <?= $this->render('__sidebar',['profile' => $profile]) ?>
  <div class="profile-page__main">
    <div class="profile-card profile-row-title">
      <h2 class="profile-title">
        Добро пожаловать в ваш личный кабинет!
      </h2>
      <p class="profile-desc">
        Здесь вы можете подключить бота и настроить фильтры
      </p>
    </div>
    <div class="profile-page__content">
      <div class="profile-card profile-plug-bot">
        <h2 class="profile-title">
          Подключите бота
        </h2>
        <p class="profile-desc">
          И получайте уведомления о новых заказах с фриланс-бирж в свой аккаунт
          мессенджеров и соцсетей
        </p>
        <ul class="profile-plug-bot__list">
          <li class="profile-plug-bot__item">
            <div class="profile-plug-bot__icon">
              <img alt="tg" src="<?= $theme->getUrl('img/static/telegram-icon.svg') ?>">
            </div>
            <div class="profile-plug-bot__content">
              <p class="profile-plug-bot__item-title">
                Telegram
              </p>
              <a class="link-hover link-hover--blue profile-plug-bot__item-desc" href="#">
                Подключить
              </a>
            </div>
          </li>
          <li class="profile-plug-bot__item">
            <div class="profile-plug-bot__icon profile-plug-bot__icon--vk">
              <img alt="vk" src="<?= $theme->getUrl('img/static/vk-icon.svg') ?>">
            </div>
            <div class="profile-plug-bot__content">
              <p class="profile-plug-bot__item-title">
                ВК
              </p>
              <p class="profile-plug-bot__item-desc profile-plug-bot__item-desc--dev">
                В разработке
              </p>
            </div>
          </li>
          <li class="profile-plug-bot__item">
            <div class="profile-plug-bot__icon profile-plug-bot__icon--viber">
              <img alt="tg" src="<?= $theme->getUrl('img/static/viber.svg') ?>">
            </div>
            <div class="profile-plug-bot__content">
              <p class="profile-plug-bot__item-title">
                Viber
              </p>
              <p class="profile-plug-bot__item-desc profile-plug-bot__item-desc--dev">
                В разработке
              </p>
            </div>
          </li>
        </ul>
      </div>

      <div class="profile-card profile-filter">
        <h2 class="profile-title">
          Фильтры
        </h2>
        <p class="profile-desc">
          Доступны на тарифе PRO
        </p>
        <img alt="filter" class="profile-filter__img" src="<?= $theme->getUrl('img/static/profile-filter.jpg') ?>">
      </div>

    </div>
  </div>
</section>
