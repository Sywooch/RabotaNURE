<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property string $goal
 * @property string $experience
 * @property string $education
 * @property string $knowledge
 * @property string $language
 * @property string $personal
 * @property string $other
 *
 * @property Student $Student
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'goal', 'experience', 'education', 'knowledge', 'language', 'personal'], 'required'],
            [['idStudent'], 'integer'],
            [['goal', 'experience', 'education', 'knowledge', 'language', 'personal', 'other'], 'string'],
            [['idStudent'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'idStudent' => Yii::t('app', 'Студент'),
            'goal' => Yii::t('app', 'Цель'),
            'experience' => Yii::t('app', 'Опыт работы'),
            'education' => Yii::t('app', 'Образование'),
            'knowledge' => Yii::t('app', 'Профессиональные навыки и знания'),
            'language' => Yii::t('app', 'Знание языков'),
            'personal' => Yii::t('app', 'Личные качества'),
            'other' => Yii::t('app', 'Прочее'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['idUser' => 'idStudent']);
    }
}
