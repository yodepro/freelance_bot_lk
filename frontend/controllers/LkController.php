<?php

declare(strict_types=1);

namespace frontend\controllers;

use common\models\PaymentOrder;
use common\models\PaymentRate;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LkController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
            /*            'verbs' => [
                            'class' => VerbFilter::className(),
                            'actions' => [
                                'logout' => ['post'],
                            ],
                        ],*/
        ];
    }

    public function actionIndex()
    {
        $profile = Yii::$app->user->identity;
        return $this->render('index',['profile' => $profile]);
    }

    public function actionUpdate()
    {
        $profile = Yii::$app->user->identity;
        return $this->render('update',['profile' => $profile]);
    }

    public function actionPassword()
    {
        $profile = Yii::$app->user->identity;
        return $this->render('password',['profile' => $profile]);
    }

    public function actionRates()
    {
        /**
         * @var $profile User
         */
        $profile = Yii::$app->user->identity;

        $history = $profile->getPayments()
            ->alias('p')
            ->andWhere(['p.status' => PaymentOrder::STATUS_APPROVE])
            ->joinWith('rate')
            ->orderBy(['p.created_at' => SORT_DESC])
            ->limit(12)
            ->asArray()
            ->all();

        return $this->render('rates', [
            'profile' => $profile,
            'history' => $history
        ]);
    }
}
