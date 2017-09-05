<?php


namespace app\models;


use yii\base\Model;

class EducationForm extends Model
{
    public $university_name;
    public $from;
    public $to;

    public function rules()
    {
        return [
            [['university_name','from','to'],'required'],
            [['from','to'],'integer'],
            ['university_name','string','min'=>2,'max'=>255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'university_name'=>'Название учебного завидения',
            'from'=>'Начало учебы',
            'to'=>'Конец учебы',
        ];
    }

    public function updateEducationData(Myprofile $profile){
           $education = Education::findOne(['profile_id'=>$profile->id]);
            if($education){
               $education->university_name = $this->university_name;
               $education->from = $this->from+1-1;
               $education->to=$this->to+1-1;
               return $education->save(false);
           }else{
                $education = new Education();
                $education->university_name = $this->university_name;
                $education->from = $this->from+1-1;
                $education->to=$this->to+1-1;
                $education->profile_id = $profile->id;
                return $education->save(false);
            }
    }
}