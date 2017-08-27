<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;

class ProfileController extends Controller
{

    public  function actionIndex(){

        return $this->render('index');
    }

    public function actionAbout(){

        return $this->render('about');
    }

    public function actionPhotos(){

        return $this->render('photos');
    }

    public function actionFriends(){

        return $this->render('friends');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}