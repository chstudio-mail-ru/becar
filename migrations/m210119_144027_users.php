<?php

use yii\db\Migration;

/**
 * Class m210119_144027_users
 */
class m210119_144027_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE "users" (
            "id" serial PRIMARY KEY,
            "email" varchar(50) COLLATE "default" NOT NULL,
            "password" varchar(64) COLLATE "default" NOT NULL,
            "status_id" int4 DEFAULT 1 NOT NULL,
            "name" varchar(500) COLLATE "default" NOT NULL,
            "sex" bool,
            "created_at" timestamp(0) DEFAULT now() NOT NULL,
            "deleted" bool DEFAULT false NOT NULL,
            "auth_key" varchar(32) COLLATE "default",
            "group_id" integer default 0 NOT NULL,
            UNIQUE(email)
            );'
        );
        $this->createIndex('group_id_idx', '{{%users}}', 'group_id');

        try {
            Yii::$app->runAction("gii/model", ["tableName" => "users", "modelClass" => "UsersBase", "ns" => "app\\models"]);
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
        $this->dropPrimaryKey("id", "users");
        $this->dropIndex("group_id_idx", "users");
        $this->dropTable("users");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210119_144027_users cannot be reverted.\n";

        return false;
    }
    */
}
