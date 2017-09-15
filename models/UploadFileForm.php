<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFileForm extends Model
{

    public $image;
    public $discription;


    public function attributeLabels()
    {
        return [
            'image' => 'Добавление фото',
            'discription'=>'Описание:',
        ];
    }

    public function rules()
    {
        return [
            ['image', 'required'],
            [['discription'], 'string'],
            [['image'],'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function uploadFile(UploadedFile $file, $dirName){

        $fileName = strtolower(md5(uniqid($file->baseName ))).'.'.$file->extension;
        $file->saveAs(Yii::getAlias('@web').$dirName.'/'.$fileName);

        if(file_exists(Yii::getAlias('@web').$dirName.'/'.$fileName)) {
            return $fileName;
        }
        else
            return false;
        }
    }


