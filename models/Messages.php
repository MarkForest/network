<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $published_date
 * @property string $content
 * @property int $profile_id
 * @property int $friend_id
 *
 * @property Friends $friend
 * @property Myprofile $profile
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['published_date', 'content', 'profile_id', 'friend_id'], 'required'],
            [['published_date'], 'safe'],
            [['content'], 'string'],
            [['profile_id', 'friend_id'], 'integer'],
            [['friend_id'], 'exist', 'skipOnError' => true, 'targetClass' => Friends::className(), 'targetAttribute' => ['friend_id' => 'id']],
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
            'published_date' => 'Published Date',
            'content' => 'Content',
            'profile_id' => 'Profile ID',
            'friend_id' => 'Friend ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriend()
    {
        return $this->hasOne(Friends::className(), ['id' => 'friend_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Myprofile::className(), ['id' => 'profile_id']);
    }
}
