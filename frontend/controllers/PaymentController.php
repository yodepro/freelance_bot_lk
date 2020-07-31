<?php

declare(strict_types=1);

namespace frontend\controllers;

use common\components\payment\Unitpay;
use common\models\PaymentOrder;
use common\models\PaymentRate;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PaymentController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * @param string $rate
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($rate)
    {
        $user = Yii::$app->user->identity;
        $rate = $this->findRate($rate);
        $order = new PaymentOrder(
            [
                'user_id' => $user->id,
                'rate_id' => $rate->id,
                'total' => $rate->price
            ]
        );

        if (!$order->save()) {
            return $this->goBack();
        }

        /**
         * @var $unitPay Unitpay
         */
        $unitPay = Yii::$app->unitpay;
        return $this->redirect($unitPay->getRedirectLink($order));
    }

    /**
     * @param $id
     * @return PaymentRate
     * @throws NotFoundHttpException
     */
    public function findRate($id): PaymentRate
    {
        if (!$model = PaymentRate::find()->active()->andWhere(['id' => $id])->one()) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}
