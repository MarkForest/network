<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commentphotos".
 *
 * @property int $id
 * @property string $mini_avatar
 * @property string $content
 * @property string $author
 * @property int $photo_id
 *
 * @property Photos $photo
 */
class Commentphotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commentphotos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mini_avatar', 'content', 'author', 'photo_id'], 'required'],
            [['content'], 'string'],
            [['photo_id'], 'integer'],
            [['mini_avatar', 'author'], 'string', 'max' => 255],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Photos::className(), 'targetAttribute' => ['photo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mini_avatar' => 'Mini Avatar',
            'content' => 'Content',
            'author' => 'Author',
            'photo_id' => 'Photo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photo_id']);
    }
}
