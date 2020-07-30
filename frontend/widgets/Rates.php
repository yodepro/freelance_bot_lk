<?php

declare(strict_types=1);


namespace frontend\widgets;


use common\models\PaymentRate;
use yii\base\Widget;

class Rates extends Widget
{
    public function run()
    {
        $models = PaymentRate::find()->showed()->all();
        return $this->render('rates', ['models' => $models]);
    }
}
