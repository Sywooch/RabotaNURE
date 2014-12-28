<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $text
 * @property string $lang
 * @property integer $image_id
 *
 * @property Image $image
 */
class Page extends \yii\db\ActiveRecord
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
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'text', 'lang'], 'required'],
            [['text'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
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
            'text' => Yii::t('app', 'Text'),
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
