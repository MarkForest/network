<?php


namespace app\models;


use yii\base\Model;

class SettingForm extends Model
{
    public $aboutMe;
    public $aboutWork;
    public $requestFriend;
    public $messages;
    public $sound;

    public function rules()
    {
        return [
            [['aboutMe','aboutWork','requestFriend','messages','sound'],'integer'],
        ];
    }

    public function updateSettings(Settings $setting)
    {
        $setting->aboutMe = $this->aboutMe;
        $setting->aboutWork = $this->aboutWork;
        $setting->requestFriend = $this->requestFriend;
        $setting->messages = $this->messages;
        $setting->sound = $this->sound;

        return $setting->save(false);
    }
}