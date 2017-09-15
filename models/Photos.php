<?php

namespace app\models;

use app\resourse\Resourse;
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

    static public $DIR_PHOTO = 'images/album';
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
            [['photo', 'published_date', 'autor', 'avatar', 'profile_id'], 'required'],
            [['discription'], 'string'],
            [['profile_id'], 'integer'],
            [['photo', 'autor', 'avatar'], 'string', 'max' => 255],
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
            'avatar' => 'Mini Avatar',
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

    public function savePhoto(UploadFileForm $model,$profile_id,User $user,Avatars $avatar ){
        $this->photo = $model->image;
        $this->discription = $model->discription;
        $this->published_date = date('Y').'-'.date('m').'-'.date('d');
        $this->autor = $user->firstname.' '.$user->lastname;
        $this->avatar = $avatar->avatar;
        $this->profile_id = $profile_id;

        return $this->save()?true:false;
    }
}
