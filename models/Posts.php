<?php

namespace app\models;

use Faker\Provider\DateTime;
use Yii;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $image
 * @property string $published_date
 * @property string $content
 * @property int $profile_id
 *
 * @property Comments[] $comments
 * @property Likeposts[] $likeposts
 * @property Myprofile $profile
 */
class Posts extends \yii\db\ActiveRecord implements Linkable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'profile_id','published_date'], 'required'],
            [['content'], 'string'],
            [['profile_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Myprofile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'published_date' => 'Published Date',
            'content' => 'Content',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeposts()
    {
        return $this->hasMany(Likeposts::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
        {
        return $this->hasOne(Myprofile::className(), ['id' => 'profile_id']);
    }

    public function diffPublishedAtCurrDate(){
        $publishedDate = date_create($this->published_date);
        $currDate = date_create(date('Y-m-d').'');
        $interval = $publishedDate->diff($currDate)->format('%R%a');
        if($interval!=0) {
            if ($interval % $interval - 1 == 1)
                return $interval . ' день назад';
            if ($interval % $interval - 1 == 1)
                return $interval . ' день назад';
            if ($interval % $interval - 1 == 2 || $interval % $interval - 1 == 3 || $interval % $interval - 1 == 4)
                return $interval . ' дня назад';
            return $interval . ' дней назад';
        }
        else return 'Сегодня';
        }

    /*******************************************
             For Api application
     ******************************************/

    /**
     * Перечислям поля которые будут отдаваться api приложением
     */
    public function fields()
    {
        return [
            'id','image','published_date','content','profile_id',
        ];
    }

    /**
     * @return array the links
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }
}
