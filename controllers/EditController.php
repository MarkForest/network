<?php

namespace app\controllers;


use yii\web\Controller;

class EditController extends Controller
{
    public function actionBasic(){
        return $this->render('basic');
    }

    public function actionInterest(){
        return $this->render('interest');
    }

    public function actionPassword(){
        return $this->render('password');
    }

    public function actionSetting(){
        return $this->render('setting');
    }

    public function actionWorkEdu(){
        return $this->render('work');
    }
}