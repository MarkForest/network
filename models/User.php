<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property string $email
 * @property string $dateofbirth
 * @property int $gender
 * @property string $city
 * @property string $country
 *
 * @property Myprofile[] $myprofiles
 * @property Reletionship[] $reletionships
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'password', 'email', 'dateofbirth', 'gender', 'city', 'country'], 'required'],
            [['dateofbirth'], 'safe'],
            [['gender'], 'integer'],
            [['firstname', 'lastname', 'city', 'country'], 'string', 'max' => 25],
            [['password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password' => 'Password',
            'email' => 'Email',
            'dateofbirth' => 'Dateofbirth',
            'gender' => 'Gender',
            'city' => 'City',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyprofiles()
    {
        return $this->hasMany(Myprofile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReletionships()
    {
        return $this->hasMany(Reletionship::className(), ['user_id' => 'id']);
    }
}
