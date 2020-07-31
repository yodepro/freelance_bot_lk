<?php

declare(strict_types=1);
/* @var $this yii\web\View */

use common\models\User;

/* @var $profile User */
/* @var $history array */

$theme = $this->theme;
$this->title = 'Личный кабинет';
?>


<?= $this->render('_bread_crums') ?>
<section class="container profile-page profile-page--tarif">
    <?= $this->render('__sidebar',['profile' => $profile])?>
    <div class="profile-page__main">
        <div class="profile-card profile-row-title">
            <h2 class="profile-title">
                Добро пожаловать в список тарифов Freelance Bot'a
            </h2>
            <p class="profile-desc">
                Здесь вы можете приобрести подписку и посмотреть историю покупок
            </p>
        </div>
        <div class="profile-page__content">
            <div class="profile-card profile-tarif">
                <h2 class="profile-title">
                    Тарифы
                </h2>
                <p class="profile-desc">
                    Выберите тариф, соответствующий вашим потребностям
                </p>
                <?=\frontend\widgets\Rates::widget(); ?>
            </div>
            <div class="profile-card profile-history">
                <h2 class="profile-title">
                    История покупок
                </h2>
                <p class="profile-desc">
                    Вся информация о платных подписках
                </p>
                <ul class="profile-history__list">
                    <?php foreach ($history as $payment): ?>

                      <li class="profile-history__item">
                        <p class="profile-history__price">
                            <?= $payment['rate']['title'] ?> - <?= (int)$payment['total'] ?> ₽
                        </p>
                        <p class="profile-history__date">
                            <?= Yii::$app->formatter->asDate($payment['created_at'], 'php:d.m.Y') ?>
                        </p>
                      </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>
