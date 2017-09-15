<?php

namespace app\controllers;


use app\models\UploadFileForm;
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
use yii\web\UploadedFile;

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
        $work = WorkExp::findOne(['profile_id'=>$myProfile->id]);
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
        $sql = 'select * from photos where profile_id = :profile_id order by id DESC';
        $params = ['profile_id'=>$myProfile->id];
        $photos = Photos::findBySql($sql,$params)->asArray()->all();
        $model = new UploadFileForm;


        /**
         *             Загрузка фото
         ******************************************/
        if (Yii::$app->request->isPost){
            $photo = new Photos();
            $file = UploadedFile::getInstance($model,'image');
            if(isset($_POST['UploadFileForm']['discription'])){

                $model->discription = $_POST['UploadFileForm']['discription'];
            }
            $model->image = $model->uploadFile($file,Photos::$DIR_PHOTO);

            if($model->validate()&&$photo->savePhoto($model,$myProfile->id,$user,$avatars)){
                $photos = Photos::findBySql($sql,$params)->asArray()->all();
                return $this->render('photos',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'photos'=>$photos,
                    'model'=>$model,
                    'alertSuccessText' => true,
                ]);
            }else{
                return $this->render('photos',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'photos'=>$photos,
                    'model'=>$model,
                    'alertDangerText' => true,
                ]);
            }
        }

        if(isset($_GET['isDelete'])){
            $photos = Photos::findBySql($sql,$params)->asArray()->all();
            return $this->render('photos',[
                'avatars'=>$avatars,
                'user'=>$user,
                'profile'=>$myProfile,
                'photos'=>$photos,
                'model'=>$model,
                'alertSuccessText' => true,
            ]);
        }

        if(isset($_GET['isNotDelete'])){
            $photos = Photos::findBySql($sql,$params)->asArray()->all();
            return $this->render('photos',[
                'avatars'=>$avatars,
                'user'=>$user,
                'profile'=>$myProfile,
                'photos'=>$photos,
                'model'=>$model,
                'alertDangerText' => true,
            ]);
        }

        return $this->render('photos',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'photos'=>$photos,
            'model'=>$model,
        ]);
    }

    /**************************************
     * Удаление фото
     **************************************/
    public function actionDeletePhoto($id){

        $photo = Photos::findOne(['id'=>$id]);
        $fileName = $photo->photo;

        if(file_exists(Photos::$DIR_PHOTO.'/'.$fileName)){
            if(unlink(Photos::$DIR_PHOTO.'/'.$fileName)) {
                if($photo->delete()){
                    $this->redirect(['profile/photos','id'=>Yii::$app->user->id,'isDelete'=>'1']);
                }
                else{
                    $this->redirect(['profile/photos','id'=>Yii::$app->user->id,'isNotDelete'=>'1']);
                }
            }else{
                $this->redirect(['profile/photos','id'=>Yii::$app->user->id,'isNotDelete'=>'1']);
            }
        }else{
            $this->redirect(['profile/photos','id'=>Yii::$app->user->id,'isNotDelete'=>'1']);
        }



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