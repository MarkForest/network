<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "friends".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $job_title
 * @property int $profile_id
 *
 * @property Myprofile $profile
 * @property Messages[] $messages
 */
class Friends extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'friends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'profile_id','profile_friend_id'], 'required'],
            [['profile_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 25],
            [['job_title'], 'string', 'max' => 255],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'job_title' => 'Job Title',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['friend_id' => 'id']);
    }
}
