<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $idUser
 * @property string $ticket
 * @property string $group
 * @property string $birth_date
 *
 * @property Resume[] $resumes
 * @property User $User
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'birth_date'], 'required'],
            [['idUser'], 'integer'],
            [['birth_date'], 'safe'],
            [['ticket'], 'string', 'max' => 20],
            [['group'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => Yii::t('app', 'Id User'),
            'ticket' => Yii::t('app', 'Ticket'),
            'group' => Yii::t('app', 'Group'),
            'birth_date' => Yii::t('app', 'Birth Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resume::className(), ['idStudent' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
