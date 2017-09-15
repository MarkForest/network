<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 26.08.17
 * Time: 3:50
 */

namespace app\controllers;


use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionPhotos(){
        return $this->render('photos');
    }

    public function actionFriends(){
        return $this->render('friends');
    }

    public function actionMessages(){
        return $this->render('messages');
    }

    public function actionSearchFriends(){
        return $this->render('searchFriends');
    }
}