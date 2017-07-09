<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "likephotos".
 *
 * @property int $id
 * @property int $profile_id
 * @property int $photo_id
 *
 * @property Photos $photo
 */
class Likephotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'likephotos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'photo_id'], 'required'],
            [['profile_id', 'photo_id'], 'integer'],
            [['profile_id'], 'unique'],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Photos::className(), 'targetAttribute' => ['photo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'photo_id' => 'Photo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photo_id']);
    }
}
