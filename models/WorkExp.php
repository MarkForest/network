<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_exp".
 *
 * @property int $id
 * @property string $organizetion_title
 * @property string $date_pushed
 * @property string $date_poped
 * @property int $profile_id
 *
 * @property Myprofile $profile
 */
class WorkExp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_exp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizetion_title', 'profile_id'], 'required'],
            [['date_pushed', 'date_poped'], 'safe'],
            [['profile_id'], 'integer'],
            [['organizetion_title'], 'string', 'max' => 255],
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
            'organizetion_title' => 'Organizetion Title',
            'date_pushed' => 'Date Pushed',
            'date_poped' => 'Date Poped',
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
