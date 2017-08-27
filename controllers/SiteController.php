<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public $layout = 'register';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $model=new RegisterForm();
        $login_model=new LoginForm();

        if(isset($_POST['RegisterForm'])){
            $model->attributes = Yii::$app->request->post('RegisterForm');

            if($model->validate() && $model->register()){
                $login_model->email = $model->email;
                $login_model->password = $model->password;
                if($login_model->validate()){
                    Yii::$app->user->login($login_model->getUser());
                    return $this->redirect(['profile/','id'=>$login_model->getUser()->id]);
                }
            }
        }

        if (Yii::$app->request->post('LoginForm')){
            $login_model->attributes = Yii::$app->request->post('LoginForm');
            if($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->redirect(['profile/','id'=>$login_model->getUser()->id]);
            }
        }

        if(!Yii::$app->user->isGuest){
            return $this->redirect(['profile/','id'=>Yii::$app->user->identity->getId()]);
        }

        return $this->render('index',[
            'model'=>$model,
            'login_model'=>$login_model,
        ]);
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}
