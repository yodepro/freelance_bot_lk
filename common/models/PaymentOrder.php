<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_order".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $rate_id
 * @property float|null $total
 * @property string|null $gateway_data
 *
 * @property PaymentRate $rate
 * @property User $user
 */
class PaymentOrder extends ActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_CHECK = 9;
    const STATUS_APPROVE = 10;
    const STATUS_DECLINE = 11;

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
        return 'payment_order';
    }

    /**
     * {@inheritdoc}
     * @return PaymentOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentOrderQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at', 'rate_id'], 'default', 'value' => null],
            [['user_id', 'status', 'created_at', 'updated_at', 'rate_id'], 'integer'],
            [['total'], 'number'],
            [['gateway_data'], 'string'],
            [
                ['rate_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => PaymentRate::class,
                'targetAttribute' => ['rate_id' => 'id']
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id']
            ],
            ['status', 'default','value' => self::STATUS_DRAFT]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'rate_id' => 'Rate ID',
            'total' => 'Total',
            'gateway_data' => 'Gateway Data'
        ];
    }

    /**
     * Gets query for [[Rate]].
     *
     * @return ActiveQuery|PaymentRateQuery
     */
    public function getRate()
    {
        return $this->hasOne(PaymentRate::class, ['id' => 'rate_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery|ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
