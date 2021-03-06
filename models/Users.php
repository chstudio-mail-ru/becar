<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

/**
 * This is the model class extends UsersBase for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $status_id
 * @property string $name
 * @property bool|null $sex
 * @property string $created_at
 * @property bool $deleted
 * @property string|null $auth_key
 * @property int $group_id
 */
class Users extends UsersBase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['email'], 'email'],
        ]);
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        try {
            return $this->hasMany(Clients::class, ['id' => 'client_id'])
                ->viaTable(UsersRefClients::tableName(), ['user_id' => 'id'])
                ->all();
        } catch (InvalidConfigException $e) {
            //
        }
    }

    /**
     * @param int $clientId
     * @return bool
     */
    public function setClient(int $clientId): bool
    {
        return UsersRefClients::addRecord($this->id, $clientId);
    }

    /**
     * @param int $clientId
     * @return bool
     */
    public function removeClient(int $clientId): bool
    {
        return UsersRefClients::deleteRecord($this->id, $clientId);
    }

    /**
     * @param int $groupId
     * @return array
     */
    public static function getUsersByGroupId(int $groupId): array
    {
        return self::find()
            ->where(['group_id' => $groupId])
            ->all();
    }

    /**
     * @return ActiveRecord
     */
    public function getGroup(): ActiveRecord
    {
        return $this->hasOne(Groups::class, ['id' => 'group_id'])->one();
    }

    /**
     * @return array
     */
    public static function getAll(): array
    {
        return self::find()
            ->where(['deleted' => 'false'])
            ->all();
    }

}