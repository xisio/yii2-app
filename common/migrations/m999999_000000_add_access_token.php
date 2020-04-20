<?php

use yii\db\Migration;

class m999999_000000_add_access_token extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string(64));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'access_token');
    }
} 
