<?php

namespace app\controllers;


use app\models\Avatars;
use app\models\Comments;
use app\models\Education;
use app\models\Friends;
use app\models\Languages;
use app\models\Myprofile;
use app\models\Photos;
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

    public function actionPhotos($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $photos = Photos::find()->select(['photo'])->where(['profile_id'=>$myProfile->id])->asArray()->all();
        return $this->render('photos',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'photos'=>$photos,
        ]);
    }

    public function actionFriends($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $friends = Friends::find()->where(['profile_id'=>$myProfile->id])->all();

        return $this->render('friends',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'friends'=>$friends,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}