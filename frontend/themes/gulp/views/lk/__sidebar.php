<?php

declare(strict_types=1);
use common\models\User;
use yii\helpers\Url;

/* @var $profile User */

$theme = $this->theme;

//todo по условиям разработки один активный тариф, сделать нормально когда будут разработано более одного тарифа
$start = \common\models\PaymentRate::find()->active()->one();
?>

<div class="profile-page__sidebar">
    <div class="profile-sidebar profile-card">
        <div class="profile-sidebar__padding">
            <img
                alt="user"
                class="profile-sidebar__avatar"
                height="100px"
                src="<?= $theme->getUrl('img/static/ava.svg') ?>"
                width="100px"
            />
            <p class="profile-sidebar__email">
                <?= $profile->email ?>
            </p>

            <?php
            if (!$profile->isActive()): ?>
                <div class="profile-sidebar__subs">
                    <div
                        class="profile-sidebar__subs-stat profile-sidebar__subs-stat--error"
                    >
                        <!-- <img src="img/static/check-icon.svg" alt="ok" /> -->
                        <img alt="error" src="<?= $theme->getUrl('img/static/cross.svg') ?>"/>
                    </div>
                    <div class="profile-sidebar__subs-content">
                        <p class="profile-sidebar__subs-title">
                            START истек <?= Yii::$app->formatter->asDate($profile->active_to, 'php:d M') ?>
                        </p>
                        <a
                            class="link-hover link-hover--blue profile-sidebar__subs-link"
                            href="<?= Url::toRoute(['payment/create', 'rate' => $start->id]) ?>"
                        >
                            Продлить подписку
                        </a>
                    </div>
                </div>
            <?php
            else: ?>
                <div class="profile-sidebar__subs">
                    <div class="profile-sidebar__subs-stat">
                        <img src="<?= $theme->getUrl('img/static/check-icon.svg') ?>" alt="ok"/>
                    </div>
                    <div class="profile-sidebar__subs-content">
                        <p class="profile-sidebar__subs-title">
                            START до <?= Yii::$app->formatter->asDate($profile->active_to, 'php:d M H:i') ?>
                        </p>
                        <a
                            class="link-hover link-hover--blue profile-sidebar__subs-link to-payment-btn"
                            href="<?= Url::toRoute(['payment/create', 'rate' => $start->id]) ?>"
                        >
                          Продлить подписку
                        </a>
                    </div>
                </div>

            <?php
            endif; ?>

        </div>
        <?= $this->render('_left_menu')?>
    </div>
</div>
