<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "likeposts".
 *
 * @property int $id
 * @property int $profile_id
 * @property int $post_id
 *
 * @property Posts $post
 */
class Likeposts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'likeposts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'post_id'], 'required'],
            [['profile_id', 'post_id'], 'integer'],
            [['profile_id'], 'unique'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Posts::className(), ['id' => 'post_id']);
    }
}
