<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class UsersRefClients extends UsersRefClientsBase
{
    /**
     * @param int $userId
     * @param int $clientId
     * @return ActiveRecord
     */
    private static function findByUserIdAndClientId(int $userId, int $clientId): ActiveRecord
    {
        return self::find()
            ->where(['user_id' => $userId])
            ->andWhere(['client_id' => $clientId])
            ->one();
    }

    public static function addRecord($userId, $clientId): bool
    {
        $reference = self::findByUserIdAndClientId($userId, $clientId);
        if(!$reference) {
            $reference = new self();
            $reference->user_id = $userId;
            $reference->client_id = $clientId;

            return $reference->save();
        } else {
            return false;
        }
    }

    public static function deleteRecord($userId, $clientId): bool
    {
        $reference = self::findByUserIdAndClientId($userId, $clientId);

        try {
            return $reference->delete();
        } catch (StaleObjectException $e) {
            return false;
        } catch (\Throwable $e) {
            return false;
        }
    }
}