<?php

use common\models\User;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_order}}`.
 */
class m200729_140416_create_payment_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable(
            '{{%payment_rate}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(32),
                'status' => $this->tinyInteger()->notNull()->defaultValue(User::STATUS_INACTIVE),
                'price' => $this->decimal(8,2),
                'price_old' => $this->decimal(8,2)->null(),
                'duration' => $this->integer(),
                'description' => $this->text(),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ]
        );

        $this->createTable(
            '{{%payment_order}}',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(),
                'status' => $this->tinyInteger()->notNull()->defaultValue(User::STATUS_INACTIVE),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
                'rate_id' => $this->integer()->null(),
                'total' => $this->decimal(8,2),
                'gateway_data' => $this->text()
            ]
        );

        $this->addForeignKey(
            'fk_order_user',
            '{{%payment_order}}',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_order_rate',
            '{{%payment_order}}',
            'rate_id',
            'payment_rate',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_order}}');
    }
}
