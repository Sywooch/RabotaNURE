<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application_job".
 *
 * @property integer $id
 * @property integer $idApplication
 * @property string $name
 * @property integer $quantity
 * @property string $salary
 *
 * @property Application $Application
 */
class ApplicationJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idApplication', 'name', 'quantity', 'salary'], 'required'],
            [['idApplication', 'quantity'], 'integer'],
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 255]
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
            'quantity' => Yii::t('app', 'Quantity'),
            'salary' => Yii::t('app', 'Salary'),
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
