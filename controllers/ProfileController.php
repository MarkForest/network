<?php

namespace app\controllers;


use app\models\Avatars;
use app\models\Comments;
use app\models\Education;
use app\models\Languages;
use app\models\Myprofile;
use app\models\Posts;
use app\models\User;
use app\models\WorkExp;
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
        $posts = Posts::find()->where(['profile_id'=>$myProfile->id])->all();

        return $this->render('index',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'posts'=>$posts,
        ]);
    }

    public function actionAbout($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $work = WorkExp::find()->where(['profile_id'=>$myProfile->id])->all();
        $education = Education::find()->where(['profile_id'=>$myProfile->id])->all();
        $languages = Languages::find()->where(['profile_id'=>$myProfile->id])->all();

        return $this->render('about',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'work'=>$work,
            'education'=>$education,
            'languages'=>$languages,
        ]);
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