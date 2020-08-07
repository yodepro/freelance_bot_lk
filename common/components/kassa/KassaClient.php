<?php

namespace common\components\kassa;

use Komtet\KassaSdk\CalculationSubject;
use Komtet\KassaSdk\Check;
use Komtet\KassaSdk\Client;
use Komtet\KassaSdk\Payment;
use Komtet\KassaSdk\Position;
use Komtet\KassaSdk\QueueManager;
use Komtet\KassaSdk\TaxSystem;
use Komtet\KassaSdk\Vat;

class KassaClient implements Kassa
{

    public $key;
    public $secret;
    public $queueId;

    private $_client;
    private $_queueManager;

    public function __construct($key, $secret, $queueId)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->queueId = $queueId;

        $this->_client = new Client($this->key, $this->secret);
        $this->_queueManager = new QueueManager($this->_client);
        $this->_queueManager->registerQueue('main-queue', $this->queueId);
    }

    /**
     * @param $checkID
     * @param $clientEmail
     * @param $payerSum
     * @param $direction
     * @return mixed
     */
    public function putCheck($checkID, $clientEmail, $payerSum, $direction = 'Услуги')
    {
        $check = Check::createSell(
            $checkID,
            $clientEmail,
            TaxSystem::SIMPLIFIED_IN_OUT
        );
        $check->setShouldPrint(true);
        $vat = new Vat(Vat::RATE_NO);

        $position = new Position(
            $direction,
            $payerSum,
            1,
            $payerSum,
            $vat
        );

        $position->setCalculationSubject(CalculationSubject::SERVICE);

        $check->addPosition($position);
        $payment = new Payment(Payment::TYPE_CARD, $payerSum);
        $check->addPayment($payment);

        return $this->_queueManager->putCheck($check, 'main-queue');

    }
}
