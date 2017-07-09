<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property string $photo
 * @property string $published_date
 * @property string $autor
 * @property string $mini_avatar
 * @property string $discription
 * @property int $profile_id
 *
 * @property Commentphotos[] $commentphotos
 * @property Likephotos[] $likephotos
 * @property Myprofile $profile
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo', 'published_date', 'autor', 'mini_avatar', 'profile_id'], 'required'],
            [['published_date'], 'safe'],
            [['discription'], 'string'],
            [['profile_id'], 'integer'],
            [['photo', 'autor', 'mini_avatar'], 'string', 'max' => 255],
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
            'photo' => 'Photo',
            'published_date' => 'Published Date',
            'autor' => 'Autor',
            'mini_avatar' => 'Mini Avatar',
            'discription' => 'Discription',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentphotos()
    {
        return $this->hasMany(Commentphotos::className(), ['photo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikephotos()
    {
        return $this->hasMany(Likephotos::className(), ['photo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Myprofile::className(), ['id' => 'profile_id']);
    }
}
