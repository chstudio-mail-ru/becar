<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $email
 * @property string $password
 * @property int $status_id
 * @property string $name
 * @property bool|null $sex
 * @property string $created_at
 * @property bool $deleted
 * @property string|null $auth_key
 * @property string|null $group
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
            [['parent_id', 'status_id'], 'default', 'value' => null],
            [['parent_id', 'status_id'], 'integer'],
            [['email', 'password', 'name'], 'required'],
            [['sex', 'deleted'], 'boolean'],
            [['created_at'], 'safe'],
            [['group'], 'string'],
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
            'parent_id' => 'Parent ID',
            'email' => 'Email',
            'password' => 'Password',
            'status_id' => 'Status ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'created_at' => 'Created At',
            'deleted' => 'Deleted',
            'auth_key' => 'Auth Key',
            'group' => 'Group',
        ];
    }
}
