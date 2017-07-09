<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $title
 * @property int $profile_id
 *
 * @property Myprofile $profile
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'profile_id'], 'required'],
            [['profile_id'], 'integer'],
            [['title'], 'string', 'max' => 25],
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
            'title' => 'Title',
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
