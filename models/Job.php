<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property integer $idCompany
 * @property integer $idCategory
 * @property string $speciality
 * @property string $position
 * @property string $min_payment
 * @property string $education
 * @property string $mode
 * @property string $schedule
 * @property string $type
 * @property string $description
 * @property string $date
 * @property integer $status
 *
 * @property Company $Company
 * @property Category $Category
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCompany', 'idCategory', 'speciality', 'position', 'min_payment', 'education', 'mode', 'schedule', 'type', 'description', 'date', 'status'], 'required'],
            [['idCompany', 'idCategory', 'status'], 'integer'],
            [['min_payment'], 'number'],
            [['description'], 'string'],
            [['speciality'], 'string', 'max' => 255],
            [['position', 'education', 'mode', 'schedule', 'type'], 'string', 'max' => 100],
            [['date'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCompany' => Yii::t('app', 'Id Company'),
            'idCategory' => Yii::t('app', 'Id Category'),
            'speciality' => Yii::t('app', 'Speciality'),
            'position' => Yii::t('app', 'Position'),
            'min_payment' => Yii::t('app', 'Min Payment'),
            'education' => Yii::t('app', 'Education'),
            'mode' => Yii::t('app', 'Mode'),
            'schedule' => Yii::t('app', 'Schedule'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['idUser' => 'idCompany']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }
}
