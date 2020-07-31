<?php

use yii\db\Migration;

/**
 * Class m200731_143746_alter_user_table
 */
class m200731_143746_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','user_uuid', $this->string(36));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200731_143746_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200731_143746_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
