<?php

namespace app\controllers;


use app\models\Avatars;
use app\models\ChangePasswordForm;
use app\models\EditBasicInfoForm;
use app\models\Education;
use app\models\EducationForm;
use app\models\Myprofile;
use app\models\SettingForm;
use app\models\Settings;
use app\models\User;
use app\models\WorkExp;
use app\models\WorkForm;
use yii\web\Controller;
use app\resourse\Resourse;
use Yii;

class EditController extends Controller
{

    /**************************************
         Базовые настройки
    **************************************/
    public function actionBasic($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $model = new EditBasicInfoForm();
        $options = Resourse::getOptionsForSelect();
        $day = date('d',strtotime($user->dateofbirth));
        $month = date('m',strtotime($user->dateofbirth));
        $year = date('Y',strtotime($user->dateofbirth));
        $model->gender = $user->gender;


        if(Yii::$app->request->post('EditBasicInfoForm')) {

            $tmpEmail = $user->email;
            $user->email = '';
            $user->save();

            if ($model->firstname !== $_POST['EditBasicInfoForm']['firstname'])
                $model->firstname = $_POST['EditBasicInfoForm']['firstname'];
            if ($model->lastname !== $_POST['EditBasicInfoForm']['lastname'])
                $model->lastname = $_POST['EditBasicInfoForm']['lastname'];
            if ($model->email !== $_POST['EditBasicInfoForm']['email'])
                $model->email = $_POST['EditBasicInfoForm']['email'];
            if ($model->gender !== $_POST['EditBasicInfoForm']['gender'])
                $model->gender = $_POST['EditBasicInfoForm']['gender'];
            if ($model->day !== $_POST['EditBasicInfoForm']['day'])
                $model->day = $_POST['EditBasicInfoForm']['day'];
            if ($model->month !== $_POST['EditBasicInfoForm']['month'])
                $model->month = $_POST['EditBasicInfoForm']['month'];
            if ($model->year !== $_POST['EditBasicInfoForm']['year'])
                $model->year = $_POST['EditBasicInfoForm']['year'];
            if ($model->about !== $_POST['EditBasicInfoForm']['about'])
                $model->about = $_POST['EditBasicInfoForm']['about'];
            if ($model->city !== $_POST['EditBasicInfoForm']['city'])
                $model->city = $_POST['EditBasicInfoForm']['city'];
            if ($model->country !== $_POST['EditBasicInfoForm']['country'])
                $model->country = $_POST['EditBasicInfoForm']['country'];


            if ($model->validate() && $model->register($user, $myProfile))
                return $this->render('basic', [
                    'avatars' => $avatars,
                    'user' => $user,
                    'profile' => $myProfile,
                    'model' => $model,
                    'options' => $options,
                    'day' => $day + 1 - 1,
                    'month' => $month + 1 - 1,
                    'year' => $year,
                    'alertSuccessText' => true,
                ]);
            else {
                $user->email = $tmpEmail;
                $user->save();
                return $this->render('basic', [
                    'avatars' => $avatars,
                    'user' => $user,
                    'profile' => $myProfile,
                    'model' => $model,
                    'options' => $options,
                    'day' => $day + 1 - 1,
                    'month' => $month + 1 - 1,
                    'year' => $year,
                    'alertDangerText' => true,
                ]);
            }
        }

            return $this->render('basic', [
                'avatars' => $avatars,
                'user' => $user,
                'profile' => $myProfile,
                'model' => $model,
                'options' => $options,
                'day' => $day + 1 - 1,
                'month' => $month + 1 - 1,
                'year' => $year,
            ]);
    }

    /*************************************
         Изменить пароль
    *************************************/
    public function actionPassword($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $model = new ChangePasswordForm();

        if (Yii::$app->request->post('ChangePasswordForm')){
            $model->attributes = Yii::$app->request->post('ChangePasswordForm');
            if ($model->validate()&&$model->updatePassword($user)){
                return $this->render('password',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'model'=>$model,
                    'alertSuccessText'=>true,
                ]);
            }else{
                return $this->render('password',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'model'=>$model,
                    'alertDangerText'=>true,
                ]);
            }
        }

        return $this->render('password',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'model'=>$model,
        ]);
    }

    /********************************
         Настройки аккаунта
    ********************************/
    public function actionSetting($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $model = new SettingForm();
        $setting = Settings::findOne(['profile_id'=>$myProfile->id]);

        if (isset($_POST['btnUpdate'])){

            isset($_POST['aboutMe'])?$model->aboutMe=1:$model->aboutMe=0;
            isset($_POST['aboutWork'])?$model->aboutWork=1:$model->aboutWork=0;
            isset($_POST['requestFriend'])?$model->requestFriend=1:$model->requestFriend=0;
            isset($_POST['messages'])?$model->messages=1:$model->messages=0;
            isset($_POST['sound'])?$model->sound=1:$model->sound=0;


            if($model->validate()&&$model->updateSettings($setting)){
                return $this->render('setting',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'setting'=>$setting,
                    'alertSuccessText'=>true,
                ]);
            }else{
                return $this->render('setting',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'setting'=>$setting,
                    'alertDangerText'=>true,
                ]);
            }
        }

        return $this->render('setting',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'setting'=>$setting,
        ]);
    }

    /************************************
         Сведенья про образование
    ************************************/
    public function actionEducation($id){
        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $modelEducation = new EducationForm();
        $education = Education::findOne(['profile_id'=>$myProfile->id]);
        if(count($education)){
            $modelEducation->from = $education->from;
            $modelEducation->to = $education->to;
        }else{
            $modelEducation->to = date('Y');
        }
        $options = Resourse::getOptionsForSelect();

        if(isset($_POST['EducationForm'])){
            $modelEducation->attributes = Yii::$app->request->post('EducationForm');
            if($modelEducation->validate()&&$modelEducation->updateEducationData($myProfile)){
                return $this->render('education',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'modelEducation'=>$modelEducation,
                    'options'=>$options,
                    'education'=>$education,
                    'alertSuccessText'=>true,
                ]);
            }else{
                return $this->render('education',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'modelEducation'=>$modelEducation,
                    'options'=>$options,
                    'education'=>$education,
                    'alertDangerText'=>true,
                ]);
            }
        }

        return $this->render('education',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'modelEducation'=>$modelEducation,
            'options'=>$options,
            'education'=>$education,
        ]);
    }



    /***********************************
         Настройки работы
    ***********************************/
    public function actionWork($id){

        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        $modelWork = new WorkForm();
        $options = Resourse::getOptionsForSelect();
        $options['itemsYear']['present'] = 'Текущее время';
        $work = WorkExp::findOne(['profile_id'=>$myProfile->id]);

        if (isset($_POST['WorkForm'])){
            $modelWork->attributes = Yii::$app->request->post('WorkForm');

            if ($modelWork->validate()&&$modelWork->updateWork($myProfile)){
                $work = WorkExp::findOne(['profile_id'=>$myProfile->id]);
                return $this->render('work',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'model'=>$modelWork,
                    'options'=>$options,
                    'alertSuccessText'=>true,
                    'work'=>$work,
                ]);
            }else{
                return $this->render('work',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$myProfile,
                    'model'=>$modelWork,
                    'options'=>$options,
                    'alertDangerText'=>true,
                    'work'=>$work,
                ]);
            }
        }


        return $this->render('work',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
            'model'=>$modelWork,
            'options'=>$options,
            'work'=>$work,
        ]);
    }
}