<?php
namespace common\components\payment;

use common\models\PaymentOrder;
use yii\base\Component;

class Unitpay extends Component
{
    private $secretKey = '';
    private $publicId = '';
    private $verificationCode = '';
    private $app;

    public function __construct($config = [])
    {
        $this->setSecretKey($config['secretKey']);
        $this->setPublicId($config['publicId']);
        $this->setVerificationCode($config['verificationCode']);

        $this->app = new \UnitPay($config['domain'], $this->getSecretKey());

        parent::__construct($config);
    }

    public function getRedirectLink(PaymentOrder $order) : string
    {
        $params = \Yii::$app->params;
        $user = $order->user;
        $paymentRate = $order->rate;

        $this->app
            ->setBackUrl($params['frontendHostInfo'])
            ->setCustomerEmail($user->email)
            ->setCashItems([
                new \CashItem($paymentRate->title, 1, $paymentRate->price)
            ]);

        $redirectUrl = $this->app->form(
            $this->getPublicId(),
            $paymentRate->price,
            $order->id,
            'Оплата тарифа "'. $paymentRate->title .'"'
        );

        return $redirectUrl;
    }

    public function verifySignature($method, array $params) : bool
    {
        $secretKey = $this->getSecretKey();
        $signature = $params['signature'];
        $hashStr = $this->getSha256SignatureByMethodAndParams($method, $params, $secretKey);

        return $hashStr === $signature;
    }

    /**
     * @param $method
     * @param array $params
     * @param $secretKey
     * @return string
     */
    private function getSha256SignatureByMethodAndParams($method, array $params, $secretKey) : string
    {
        ksort($params);
        unset($params['sign']);
        unset($params['signature']);
        array_push($params, $secretKey);
        array_unshift($params, $method);
        return hash('sha256', implode('{up}', $params));
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getPublicId(): string
    {
        return $this->publicId;
    }

    /**
     * @param string $publicId
     */
    public function setPublicId(string $publicId): void
    {
        $this->publicId = $publicId;
    }

    /**
     * @return string
     */
    public function getVerificationCode(): string
    {
        return $this->verificationCode;
    }

    /**
     * @param string $verificationCode
     */
    public function setVerificationCode(string $verificationCode): void
    {
        $this->verificationCode = $verificationCode;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $verificationCode
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }
}
