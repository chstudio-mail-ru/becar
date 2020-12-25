<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $account_type
 * @property float|null $balance
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 * @property bool|null $deleted
 * @property string $created_at
 * @property string $updated_at
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['account_type', 'created_by', 'updated_by', 'status'], 'default', 'value' => null],
            [['account_type', 'created_by', 'updated_by', 'status'], 'integer'],
            [['balance'], 'number'],
            [['deleted'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'account_type' => 'Account Type',
            'balance' => 'Balance',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
