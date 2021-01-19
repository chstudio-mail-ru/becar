<?php

use yii\db\Migration;

/**
 * Class m210119_163838_users_ref_clients
 */
class m210119_163838_users_ref_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE "users_ref_clients" (
            "id" serial PRIMARY KEY,
            "user_id" integer NOT NULL,
            "client_id" integer NOT NULL
            );'
        );
        $this->createIndex('user_id_idx', '{{%users_ref_clients}}', 'user_id');
        $this->createIndex('client_id_idx', '{{%users_ref_clients}}', 'client_id');

        try {
            Yii::$app->runAction("gii/model", ["tableName" => "users_ref_clients", "modelClass" => "UsersRefClientsBase", "ns" => "app\\models"]);
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
        $this->dropPrimaryKey("id", "users_ref_clients");
        $this->dropIndex("user_id_idx", "users_ref_clients");
        $this->dropIndex("client_id_idx", "users_ref_clients");
        $this->dropTable("users_ref_clients");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210119_163838_users_ref_clients cannot be reverted.\n";

        return false;
    }
    */
}
