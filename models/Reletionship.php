<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reletionship".
 *
 * @property int $id
 * @property int $user_add_id
 * @property int $status
 * @property int $user_id
 *
 * @property User $user
 */
class Reletionship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reletionship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_add_id', 'status', 'user_id'], 'required'],
            [['user_add_id', 'status', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_add_id' => 'User Add ID',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
