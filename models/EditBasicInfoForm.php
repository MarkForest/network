<?php

namespace app\models;

use yii\base\Model;

class EditBasicInfoForm extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $day;
    public $month;
    public $year;
    public $gender;
    public $city;
    public $country;

    public $about;

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'day','month','year', 'gender', 'city', 'country'], 'required'],
            [['firstname','lastname','city','country'],'string','max'=>25],
            ['email','email'],
            ['email','unique','targetClass'=>'app\models\User'],
            [['email'],'string','min'=>2,'max'=>255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstname'=>'Имя',
            'lastname'=>'Фамилия',
            'email'=>'Мой Email',
            'day'=>'День',
            'month'=>'Месяц',
            'year'=>'Год',
            'city'=>'Мой город',
            'country'=>'Моя страна'

        ];
    }

    public function register($user,$profile){

        $isUserSaved = false;
        $isProfileSaved = false;

        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->email = $this->email;
        $user->gender = $this->gender;
        $user->city = $this->city;
        $user->country = $this->country;
        $user->dateofbirth = $this->year.'-'.$this->month.'-'.$this->day;
        $isUserSaved = $user->save();

        $profile->personal_info = $this->about;
        $isProfileSaved = $profile->save();

        return $isUserSaved && $isProfileSaved? true:false;

    }
}