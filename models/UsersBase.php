<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
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
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'name'], 'required'],
            [['status_id', 'group_id'], 'default', 'value' => null],
            [['status_id', 'group_id'], 'integer'],
            [['sex', 'deleted'], 'boolean'],
            [['created_at'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 500],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'status_id' => 'Status ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'created_at' => 'Created At',
            'deleted' => 'Deleted',
            'auth_key' => 'Auth Key',
            'group_id' => 'Group ID',
        ];
    }
}
