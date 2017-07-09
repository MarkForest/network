<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $avatar
 * @property string $text
 * @property string $author_name
 * @property int $post_id
 *
 * @property Posts $post
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['avatar', 'text', 'author_name', 'post_id'], 'required'],
            [['text'], 'string'],
            [['post_id'], 'integer'],
            [['avatar'], 'string', 'max' => 255],
            [['author_name'], 'string', 'max' => 25],
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
            'avatar' => 'Avatar',
            'text' => 'Text',
            'author_name' => 'Author Name',
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
