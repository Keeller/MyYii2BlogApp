<?php

use yii\db\Migration;

/**
 * Class m190703_173226_add_tokenn
 */
class m190703_173226_add_tokenn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token_id',$this->integer());
        $this->addColumn('{{%user}}','refresh_token_id',$this->integer());
        $this->dropColumn('{{%user}}','isAdmin');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190703_173226_add_tokenn cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190703_173226_add_tokenn cannot be reverted.\n";

        return false;
    }
    */
}
