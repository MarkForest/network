<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int $aboutMe
 * @property int $aboutWork
 * @property int $requestFriend
 * @property int $messages
 * @property int $sound
 * @property int $profile_id
 *
 * @property Myprofile $profile
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aboutMe', 'aboutWork', 'requestFriend', 'messages', 'sound', 'profile_id'], 'integer'],
            [['profile_id'], 'required'],
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
            'aboutMe' => 'About Me',
            'aboutWork' => 'About Work',
            'requestFriend' => 'Request Friend',
            'messages' => 'Messages',
            'sound' => 'Sound',
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
