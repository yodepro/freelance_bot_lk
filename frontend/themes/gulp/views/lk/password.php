<?php

declare(strict_types=1);
use common\models\User;

/* @var $profile User */

$theme = $this->theme;

?>


<section class="container">
    <div class="bread-crumbs">
        <a class="bread-crumbs__link" href="#">
            Главная<span></span>
        </a>
        <p class="bread-crumbs__this-page">
            Личный кабинет
        </p>
    </div>
    <h1 class="section-title section-title--profile">
        Личный кабинет
    </h1>
</section>
<section class="container profile-page profile-page--tarif">


    <?= $this->render('__sidebar',['profile' => $profile])?>
    <div class="profile-page__main">
        <div class="profile-card">
            <form class="site-form">
                <div class="site-form__field">
                    <label class="label site-form__label" for="input-1"
                    >Поле 1</label
                    >
                    <input
                        class="input site-form__input"
                        id="input-1"
                        name="input-1"
                        type="text"
                    />
                </div>
                <div class="site-form__field">
                    <label class="label site-form__label" for="input-2"
                    >Поле 2</label
                    >
                    <input
                        class="input site-form__input"
                        id="input-2"
                        name="input-2"
                        type="text"
                    />
                </div>
                <button class="site-button site-form__button">
                    Сабмит формы
                </button>
            </form>
        </div>
    </div>
</section>
