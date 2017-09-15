<?php


namespace app\models;


use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $newPassword;
    public $confirmePassword;

    public function rules()
    {
        return [
            [['oldPassword','newPassword','confirmePassword'],'required'],
            [['oldPassword','newPassword','confirmePassword'],'string','min'=>2,'max'=>255],
            ['confirmePassword','compare','compareAttribute'=>'newPassword','message'=>'Пароли не совподают'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldPassword'=>'Старый пароль',
            'newPassword'=>'Новый пароль',
            'confirmePassword'=>'Повторите пароль',
        ];
    }

    public function updatePassword(User $user){
        if($user->password === sha1($this->oldPassword)) {
            $user->setPassword($this->newPassword);
            return $user->save();
        }else return false;

    }
}