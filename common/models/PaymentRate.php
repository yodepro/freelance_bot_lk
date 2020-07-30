<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_rate".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 * @property float|null $price
 * @property float|null $price_old
 * @property int|null $duration
 * @property string|null $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property PaymentOrder[] $paymentOrders
 */
class PaymentRate extends ActiveRecord
{


    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_rate';
    }

    /**
     * {@inheritdoc}
     * @return PaymentRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentRateQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'duration', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'duration', 'created_at', 'updated_at'], 'integer'],
            [['price','price_old'], 'number'],
            [['description'], 'string'],
            [['title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'price' => 'Price',
            'duration' => 'Duration',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PaymentOrders]].
     *
     * @return ActiveQuery|PaymentOrderQuery
     */
    public function getPaymentOrders()
    {
        return $this->hasMany(PaymentOrder::class, ['rate_id' => 'id']);
    }
}
