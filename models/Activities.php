<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string $title
 * @property string $date_of_activity
 * @property int $profile_id
 *
 * @property Myprofile $profile
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'date_of_activity', 'profile_id'], 'required'],
            [['date_of_activity'], 'safe'],
            [['profile_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'date_of_activity' => 'Date Of Activity',
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
