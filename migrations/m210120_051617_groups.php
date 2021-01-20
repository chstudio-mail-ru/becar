<?php

use yii\db\Migration;

/**
 * Class m210120_051617_groups
 */
class m210120_051617_groups extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE "groups" (
            "id" serial PRIMARY KEY,
            "name" varchar(500) COLLATE "default" NOT NULL,
            "created_at" timestamp(0) DEFAULT now() NOT NULL
            );'
        );
        $this->createIndex('groups_name_idx', '{{%groups}}', 'name');

        try {
            Yii::$app->runAction("gii/model", ["tableName" => "groups", "modelClass" => "GroupsBase", "ns" => "app\\models"]);
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
        $this->dropPrimaryKey("id", "groups");
        $this->dropIndex("groups_name_idx", "groups");
        $this->dropTable("groups");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210120_051617_groups cannot be reverted.\n";

        return false;
    }
    */
}
