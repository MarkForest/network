<?php

namespace app\modules\api;
use \Yii;
use yii\filters\auth\HttpBasicAuth;


/**
 * api module definition class
 */
class Api extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

    }
}
