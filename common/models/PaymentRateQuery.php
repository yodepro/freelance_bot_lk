<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[PaymentRate]].
 *
 * @see PaymentRate
 */
class PaymentRateQuery extends ActiveQuery
{
    public function active() : ActiveQuery
    {
        return $this->andWhere('[[status]]=' . PaymentRate::STATUS_ACTIVE);
    }

    public function showed() : ActiveQuery
    {
        return $this->andWhere(['OR', ['status' => PaymentRate::STATUS_ACTIVE],['status' => PaymentRate::STATUS_INACTIVE]]);
    }

    /**
     * {@inheritdoc}
     * @return PaymentRate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PaymentRate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
