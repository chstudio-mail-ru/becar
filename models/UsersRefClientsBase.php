<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_ref_clients".
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_id
 */
class UsersRefClientsBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_ref_clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'client_id'], 'required'],
            [['user_id', 'client_id'], 'default', 'value' => null],
            [['user_id', 'client_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'client_id' => 'Client ID',
        ];
    }
}
