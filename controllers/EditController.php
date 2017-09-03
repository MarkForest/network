<?php

namespace app\controllers;


use app\models\Avatars;
use app\models\EditBasicInfoForm;
use app\models\Myprofile;
use app\models\User;
use yii\web\Controller;
use app\resourse\Resourse;
use Yii;

class EditController extends Controller
{
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

    public function actionPassword($id){
        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        return $this->render('password',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
        ]);
    }

    public function actionSetting($id){
        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        return $this->render('setting',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
        ]);
    }

    public function actionWorkEdu($id){
        $user = User::findOne($id);
        $myProfile = Myprofile::findOne(['user_id'=>$id]);
        $avatars = Avatars::findOne(['profile_id'=>$myProfile->id]);
        return $this->render('work',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$myProfile,
        ]);
    }
}