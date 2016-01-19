<?php

use yii\db\Schema;
use yii\db\Migration;

class m160119_144604_creating_countries_table extends Migration
{
    public function up()
    {
        $this->createTable('country', [
            'code' => Schema::TYPE_STRING . ' NOT NULL',
            'country' => Schema::TYPE_STRING . ' NOT NULL',
            'population' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addPrimaryKey('pk_code', 'country', 'code');
    }

    public function down()
    {
        return $this->dropTable('country');
    }
}
