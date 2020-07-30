<?php

declare(strict_types=1);

namespace console\controllers;

use common\models\PaymentGateway;
use common\models\PaymentRate;
use yii\console\Controller;

class InitController extends Controller
{

    public function actionIndex()
    {

        $descStart = <<<DS
<ul class="tarif-card-list__benefits-list">
  <li class="tarif-card-list__benefits">
    Лента проектов
  </li>
  <li class="tarif-card-list__benefits">
    Краткое содержание
  </li>
  <li class="tarif-card-list__benefits">
    Ссылка на источник
  </li>
</ul>
DS;

        $descPro = <<<DP
<ul class="tarif-card-list__benefits-list">
  <li class="tarif-card-list__benefits">
    Фильтрация по цене
  </li>
  <li class="tarif-card-list__benefits">
    Настройка тем
  </li>
  <li class="tarif-card-list__benefits">
    Предпросмотр заказа
  </li>
</ul>
DP;

        $payRateStart = new PaymentRate(
            [
                'title' => 'Start',
                'status' => PaymentRate::STATUS_ACTIVE,
                'price' => 290,
                'price_old' => 599,
                'duration' => 60 * 60 * 24 * 30,
                'description' => $descStart
            ]
        );

        $payRatePro = new PaymentRate(
            [
                'title' => 'Pro',
                'status' => PaymentRate::STATUS_ACTIVE,
                'price' => 5990,
                'duration' => 60 * 60 * 24 * 30,
                'description' => $descPro
            ]
        );

        $payRateStart->save();
        $payRatePro->save();

        var_dump($payRateStart->errors);
        var_dump($payRatePro->errors);

    }
}
