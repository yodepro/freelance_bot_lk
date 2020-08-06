<?php

use frontend\themes\gulp\Theme;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'freelance-bot-frontend',
    'name' => 'Freelance Bot',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
          'appendTimestamp' => true
        ],
        'unitpay' => [
            'class' => \common\components\payment\Unitpay::class,
            'secretKey' => $params['up']['secretKey'],
            'publicId' => $params['up']['publicId'],
            'domain' => $params['up']['domain'],
            'verificationCode' => 'test'
        ],
        'view' => [
            'theme' => [
                'class' => Theme::class,
                'basePath' => '@app/build',
                'baseUrl' => '@web/build',
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'lk' => 'lk/index',
                '<action>' => 'site/<action>',
            ],
        ],
        'formatter' => [
            'locale' => 'ru'
        ]
    ],
    'modules' => [
        'noty' => [
            'class' => lo\modules\noty\Module::class,
        ],
    ],
    'params' => $params,
];
