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
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property bool|null $deleted
 */
class ClientsBase extends \yii\db\ActiveRecord
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
            [['name'], 'required'],
            [['description'], 'string'],
            [['account_type', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'], 'default', 'value' => null],
            [['account_type', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['balance'], 'number'],
            [['deleted'], 'boolean'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'deleted' => 'Deleted',
        ];
    }
}
