<?php

namespace frontend\controllers;

use common\components\kassa\Kassa;
use common\components\kassa\KassaClient;
use common\components\payment\Unitpay;
use common\models\PaymentOrder as Order;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Hook controller
 */
class HookController extends Controller
{
    public function behaviors()
    {
        return [
          'access' => [
            'class' => AccessControl::class,
            'only' => ['index'],
            'denyCallback' => static function($rule, $action){
                throw new ForbiddenHttpException('Not Allowed');
            },
            'rules' => [
              [
                'actions' => ['index'],
                'allow' => true,
                'roles' => ['?'],
                'ips' => ['31.186.100.49','178.132.203.105','52.29.152.23','52.19.56.234'],
              ],
            ],
          ],
          'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
              'index' => ['GET'],
            ],
          ],
        ];
    }

    public function actionIndex()
    {
        /**
         * @var $unitPay Unitpay
         */

        Yii::$app->response->format = Response::FORMAT_JSON;
        $unitPay = Yii::$app->unitpay;
        $params = Yii::$app->request->get();
        $method = $params['method'] ?? null;
        $methodSign = $params['params']['signature'] ?? null;
        $order_id = $params['params']['account'];

        if ($order_id === 'test'){
            return $this->successResponse('Запрос успешно обработан');
        }

        $order = Order::findOne($order_id);


        if (!$order) {
            return $this->failResponse('Заказ не найден');
        }

        $valid = $unitPay->verifySignature($method, $params['params']);

        if (!$valid) {
            $params['error'] = 'Подпись не корректна';
            $order->status = Order::STATUS_DECLINE;
            $order->gateway_data = Json::encode($params);
            return $this->failResponse('Подпись некорректна');
        }
        $order->gateway_data = Json::encode($params);
        switch ($method) {
            case ('check'):
                return $this->successResponse('Запрос успешно обработан');
                break;
            case ('pay'):
                $this->paymentSuccess($order);
                $this->putCheck($params['params']['unitpayId'], $order);
                return $this->successResponse('Запрос успешно обработан');
                break;
            default:
                $this->paymentFail($order, $params);
                return $this->failResponse('Оплата не удалась');
        }
    }

    public function failResponse($message)
    {
        return ['error' => ['message' => $message]];
    }

    public function successResponse($message)
    {
        return ['result' => ['message' => $message]];
    }

    protected function paymentSuccess(Order $order): void
    {
        $order->status = Order::STATUS_APPROVE;
        $order->user->setPayment($order);
        $order->user->save();
        $order->save();
    }

    protected function putCheck($unitpayId, Order $order){
        // отправка данных в кассовый аппарат на фискализацию
        // через компонент Комтет кассового аппарата Эвотор
        /** @var KassaClient $component */
        $component = Yii::$container->get(Kassa::class);
        $component->putCheck(
            $unitpayId,
            $order->user->email,
            (float)$order->total
        );
    }

    protected function paymentFail(Order $order, array $params): void
    {
        $order->status = Order::STATUS_DECLINE;
        $order->save();
    }
}
