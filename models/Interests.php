<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interests".
 *
 * @property int $id
 * @property string $interest
 * @property int $profile_id
 *
 * @property Myprofile $profile
 */
class Interests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['interest', 'profile_id'], 'required'],
            [['profile_id'], 'integer'],
            [['interest'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Myprofile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'interest' => 'Interest',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Myprofile::className(), ['id' => 'profile_id']);
    }
}
