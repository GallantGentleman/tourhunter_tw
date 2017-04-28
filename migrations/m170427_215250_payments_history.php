<?php

use yii\db\Migration;

class m170427_215250_payments_history extends Migration
{
    public function up()
    {
        $this->createTable('payments_history', [
            'id' => $this->primaryKey(),
            'sender' => $this->string()->notNull(),
            'recipient' => $this->string()->notNull(),
            'amount' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('payments_history');

        return false;
    }
}
