<?php

namespace frontend\bootstrap;

use common\components\kassa\Kassa;
use common\components\kassa\KassaClient;
use common\components\kassa\KassaLogger;
use Yii;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = Yii::$container;

        $container->setSingleton(Kassa::class, function () use ($app) {
            return new KassaLogger(
                new KassaClient(
                    $app->params['kassa_komtet_key'],
                    $app->params['kassa_komtet_secret'],
                    $app->params['kassa_komtet_queue']
                ),
                Yii::getLogger()
            );
        });
    }
}
