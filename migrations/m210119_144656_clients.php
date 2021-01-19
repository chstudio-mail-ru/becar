<?php

use yii\db\Migration;

/**
 * Class m210119_144656_clients
 */
class m210119_144656_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE "clients" (
            "id" serial PRIMARY KEY,
            "name" varchar(255) COLLATE "default" NOT NULL,
            "description" text COLLATE "default",
            "account_type" int4 DEFAULT 1 NOT NULL,
            "balance" float8 DEFAULT 0,
            "created_by"  int4,
            "updated_by" int4,
            "created_at" int4,
            "updated_at" int4,
            "status" int4 DEFAULT 1,
            "deleted" bool DEFAULT false
            );
        ');

        try {
            Yii::$app->runAction("gii/model", ["tableName" => "clients", "modelClass" => "ClientsBase", "ns" => "app\\models"]);
        } catch (\yii\base\InvalidRouteException | \yii\console\Exception $e) {
            echo $e->getMessage();
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey("id", "clients");
        $this->dropTable("clients");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210119_144656_clients cannot be reverted.\n";

        return false;
    }
    */
}
