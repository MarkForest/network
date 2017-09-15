<?php


namespace app\modules\api\controllers;



use app\models\Myprofile;
use app\models\Posts;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = 'app\models\Posts';


    public function actionShow(){
        return new ActiveDataProvider([
            'query'=>Posts::find(),
        ]);
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'update' or $action === 'delete') {
            if ($model->profile_id !== Myprofile::findOne(['user_id'=>Yii::$app->user->id])->id)
                throw new \yii\web\ForbiddenHttpException('Вы можете только '.$action.' статьи которые сами создали.');
        }
    }
}

