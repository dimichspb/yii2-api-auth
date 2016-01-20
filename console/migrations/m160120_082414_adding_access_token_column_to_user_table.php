<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_082414_adding_access_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'access_token', Schema::TYPE_STRING);
    }

    public function down()
    {
        return $this->dropColumn('user', 'access_token');
    }

}
