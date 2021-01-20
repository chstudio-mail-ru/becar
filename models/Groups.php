<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class extends GroupsBase for table "groups".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 */
class Groups extends GroupsBase
{
    /**
     * @param int $id
     * @return ActiveRecord
     */
    public static function findById($id): ActiveRecord
    {
        return self::find()
            ->where(['id' => $id])
            ->one();
    }

    /**
     * @param string $name
     * @return ActiveRecord
     */
    public static function findByName($name): ActiveRecord
    {
        return self::find()
            ->where(['name' => $name])
            ->one();
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function addRecord($name): bool
    {
        $entity = self::findByName($name);
        if(!$entity) {
            $entity = new self();
            $entity->name = $name;

            return $entity->save();
        } else {
            return false;
        }
    }

    /**
     * @param string $name
     * @return Groups
     */
    public function updateRecord($name): Groups
    {
        $this->name = $name;
        $this->save();

        return $this;
    }

    /**
     * @param int $groupId
     * @return bool
     */
    public static function deleteRecord(int $groupId): bool
    {
        $users = Users::getUsersByGroupId($groupId);
        if (!$users) {
            $entity = self::findById($groupId);

            if($entity) {
                return $entity->delete();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}