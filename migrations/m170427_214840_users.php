<?php

use yii\db\Migration;

class m170427_214840_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string()->notNull(),
            'balance' => $this->integer()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');

        return false;
    }
}
