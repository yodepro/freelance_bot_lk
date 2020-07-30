<?php

declare(strict_types=1);

use common\models\PaymentRate;
use yii\helpers\Url;

/**
 * @var $models PaymentRate[]
 */

?>


<div class="tarif__card-list profile-tarif__card-list">
  <ul class="tarif-card-list">
      <?php foreach ($models as $model): ?>
        <li class="tarif-card-list__item">
          <h3 class="tarif-card-list__title">
              <?= $model->title ?>
            <div class="tarif-card-list__circle"></div>
          </h3>
          <div class="tarif-card-list__content">
            <div class="tarif-card-list__price-box">
                <?php if ($model->price_old):?>
                  <p class="tarif-card-list__price-discount">
                      <?= (int) $model->price ?> ₽
                  </p>
                <?php endif; ?>

              <p class="tarif-card-list__price">
                  <?= (int) $model->price ?> ₽
              </p>
            </div>
              <?= $model->description ?>
              <?php if ($model->status === PaymentRate::STATUS_ACTIVE):?>
            <a
                class="site-button site-button--yellow tarif-card-list__button"
                href="<?= Url::toRoute(['payment/create','rate' => $model->id]) ?>"
            >
                <?php else: ?>
              <a
                  class="site-button site-button--yellow tarif-card-list__button"
                  href="#"
              >
                  <?php endif; ?>

                Выбрать тариф
              </a>
          </div>
        </li>
      <?php endforeach; ?>
  </ul>
</div>
