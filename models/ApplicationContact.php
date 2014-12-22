<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application_contact".
 *
 * @property integer $id
 * @property integer $idApplication
 * @property string $name
 * @property string $position
 * @property string $phone
 *
 * @property Application $Application
 */
class ApplicationContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idApplication', 'name', 'position', 'phone'], 'required'],
            [['idApplication'], 'integer'],
            [['name', 'position', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idApplication' => Yii::t('app', 'Id Application'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::className(), ['id' => 'idApplication']);
    }
}
