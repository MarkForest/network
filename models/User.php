<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const MAX_AGE = 80;
    const DAY_AT_MONTH = 31;
    const MONTH_AT_YEAR = 12;
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
//    public function rules()
//    {
////        return [
////            [['firstname', 'lastname', 'password', 'email', 'dateofbirth', 'gender', 'city', 'country'], 'required'],
////            [['dateofbirth'], 'safe'],
////            [['gender'], 'integer'],
////            [['firstname', 'lastname', 'city', 'country'], 'string', 'max' => 25],
////            [['password', 'email'], 'string', 'max' => 255],
////        ];
//    }

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

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function setPassword($password){
        $this->password = sha1($password);
    }

    public function validatePassword($password){
        return $this->password === sha1($password);
    }

}
