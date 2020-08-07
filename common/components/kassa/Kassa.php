<?php

namespace common\components\kassa;

interface Kassa

{
    public function putCheck($checkID, $clientEmail, $payerSum, $direction);
}
