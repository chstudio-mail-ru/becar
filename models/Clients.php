<?php /** @noinspection PhpUndefinedClassInspection */


namespace app\models;

use yii\base\InvalidConfigException;

/**
 * This is the model class extends ClientsBase for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $account_type
 * @property float|null $balance
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property bool|null $deleted
 */
class Clients extends ClientsBase
{
    /**
     * @return array
     */
    public function getUsers(): array
    {
        try {
            return $this->hasMany(Users::class, ['id' => 'user_id'])
                ->viaTable(UsersRefClients::tableName(), ['client_id' => 'id'])
                ->all();
        } catch (InvalidConfigException $e) {
            //
        }
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function setUser(int $userId): bool
    {
        return UsersRefClients::addRecord($userId, $this->id);
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function removeUser(int $userId): bool
    {
        return UsersRefClients::deleteRecord($userId, $this->id);
    }
}