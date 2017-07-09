<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "myprofile".
 *
 * @property int $id
 * @property string $personal_info
 * @property string $job_title
 * @property int $user_id
 *
 * @property Activities[] $activities
 * @property Avatars[] $avatars
 * @property Friends[] $friends
 * @property Interests[] $interests
 * @property Languages[] $languages
 * @property Messages[] $messages
 * @property User $user
 * @property Photos[] $photos
 * @property Posts[] $posts
 * @property WorkExp[] $workExps
 */
class Myprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'myprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personal_info'], 'string'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['job_title'], 'string', 'max' => 255],
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
            'personal_info' => 'Personal Info',
            'job_title' => 'Job Title',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activities::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvatars()
    {
        return $this->hasMany(Avatars::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasMany(Friends::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interests::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkExps()
    {
        return $this->hasMany(WorkExp::className(), ['profile_id' => 'id']);
    }
}
