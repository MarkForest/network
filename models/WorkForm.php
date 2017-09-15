<?php

namespace app\models;


use yii\base\Model;

class WorkForm extends Model
{
    public  $organizetion_title;
    public $from;
    public $to;
    public $post;

    public function attributeLabels()
    {
        return [
            'organizetion_title'=>'Название организации',
            'from'=>'Год устройсва',
            'to'=>'По',
            'post'=>'Должность',
        ];
    }

    public function rules(){
        return [
            [['organizetion_title','from','to','post'],'required'],
            [['organizetion_title','from','to','post'],'string','max'=>255],
        ];
    }

    public function updateWork(Myprofile $profile){
        $work = WorkExp::findOne(['profile_id'=>$profile->id]);
        if(isset($work)){
            $work->organizetion_title = $this->organizetion_title;
            $work->from = $this->from;
            $work->to = $this->to;
            $work->post = $this->post;
            return $work->save();
        }else{
            $work = new WorkExp();
            $work->organizetion_title = $this->organizetion_title;
            $work->from = $this->from;
            $work->to = $this->to;
            $work->post = $this->post;
            $work->profile_id = $profile->id;
            return $work->save();
        }
    }
}