<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $source
 *
 * @property News[] $news
 * @property Page[] $pages
 */
class Image extends \yii\db\ActiveRecord
{
    const STUB_PATH = '';
    const FORMATS = "image/gif, image/jpeg, image/png";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source'], 'required'],
            [['source'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'source' => Yii::t('app', 'Source'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['image_id' => 'id']);
    }

    public static function saveByFile($uploadedFileInstance) {
        $i = new Image();
        $rnd = rand(0,99999);
        $fileName = $rnd.'_'.$uploadedFileInstance->name; 
        $filePath = Yii::$app->basePath.'/web/uploads/'.$fileName;
        $uploadedFileInstance->saveAs($filePath);
        $i->source = $filePath;

        if ($i.save()) {
            return $i;
        }
        return null;
    }

    public function getImagePath() {
        return $this->source !== '' ? $this->source : Image::STUB_PATH;
    }
}
