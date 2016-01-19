<?php

use yii\db\Schema;
use yii\db\Migration;

class m160119_144721_populating_countries_table extends Migration
{
    public function up()
    {
        $this->execute("
            INSERT INTO `Country` VALUES ('AU','Australia',18886000);
            INSERT INTO `Country` VALUES ('BR','Brazil',170115000);
            INSERT INTO `Country` VALUES ('CA','Canada',1147000);
            INSERT INTO `Country` VALUES ('CN','China',1277558000);
            INSERT INTO `Country` VALUES ('DE','Germany',82164700);
            INSERT INTO `Country` VALUES ('FR','France',59225700);
            INSERT INTO `Country` VALUES ('GB','United Kingdom',59623400);
            INSERT INTO `Country` VALUES ('IN','India',1013662000);
            INSERT INTO `Country` VALUES ('RU','Russia',146934000);
            INSERT INTO `Country` VALUES ('US','United States',278357000);
        ");
    }

    public function down()
    {
        return $this->execute('DELETE FROM Country');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
