<?php

namespace common\components\kassa;

use Komtet\KassaSdk\Exception\ClientException;
use yii\log\Logger;

class KassaLogger implements Kassa
{

    private $next;
    private $logger;

    public function __construct(KassaClient $next, Logger $logger)
    {
        $this->next = $next;
        $this->logger = $logger;
    }


    public function putCheck($checkID, $clientEmail, $payerSum, $direction)
    {
        try {
            $result = $this->next->putCheck($checkID, $clientEmail, $payerSum, $direction);

            $this->logger->log(
                ['result'=>$result, 'message' => "Success checkout",],
                Logger::LEVEL_INFO, 'kassa/put'
            );

        } catch (ClientException $e) {

            $this->logger->log(
                ['result'=>$e, 'message' => "Checkout failed",],
                Logger::LEVEL_ERROR, 'kassa/put'
            );
        }

    }

}
