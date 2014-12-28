<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $date
 * @property string $lang
 * @property integer $image_id
 *
 * @property Image $image
 */
class News extends \yii\db\ActiveRecord
{
    public static $langs = [
        'ru' => 'ru-RU',
        'en' => 'en-US',
        'ua' => 'uk'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        // make the name unique somehow
        return [
            [['name', 'title', 'description', 'text', 'date', 'lang'], 'required'],
            [['description', 'text'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 30],
            [['lang'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
            'lang' => Yii::t('app', 'Lang'),
            'image_id' => Yii::t('app', 'Image ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }
}
