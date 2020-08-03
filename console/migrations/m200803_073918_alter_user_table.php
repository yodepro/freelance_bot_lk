<?php

use yii\db\Migration;

/**
 * Class m200803_073918_alter_user_table
 */
class m200803_073918_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('uidx_tg_id','user', 'tg_id',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200803_073918_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200803_073918_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
