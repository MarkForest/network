<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $image
 * @property string $published_date
 * @property string $content
 * @property int $profile_id
 *
 * @property Comments[] $comments
 * @property Likeposts[] $likeposts
 * @property Myprofile $profile
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['published_date'], 'safe'],
            [['content', 'profile_id'], 'required'],
            [['content'], 'string'],
            [['profile_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'published_date' => 'Published Date',
            'content' => 'Content',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeposts()
    {
        return $this->hasMany(Likeposts::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Myprofile::className(), ['id' => 'profile_id']);
    }
}
