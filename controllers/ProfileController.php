<?php

namespace app\controllers;


use app\models\Avatars;
use app\models\Comments;
use app\models\Myprofile;
use app\models\Posts;
use app\models\User;
use Faker\Provider\DateTime;
use Yii;
use yii\debug\models\search\Profile;
use yii\web\Controller;

class ProfileController extends Controller
{

    public  function actionIndex($id){
        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $gender = $user->gender;
        $posts = Posts::find()->where(['profile_id'=>$myProfile->id])->all();

        return $this->render('index',[
            'avatars'=>$avatars,
            'gender'=>$gender,
            'user'=>$user,
            'profile'=>$myProfile,
            'posts'=>$posts,
        ]);
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