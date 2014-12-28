<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $idUser
 * @property string $website
 * @property string $contact_name
 * @property string $logo_path
 *
 * @property Application[] $applications
 * @property User $User
 * @property Job[] $jobs
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'website', 'contact_name'], 'required'],
            [['idUser'], 'integer'],
            [['website', 'contact_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => Yii::t('app', 'Id User'),
            'website' => Yii::t('app', 'Website'),
            'contact_name' => Yii::t('app', 'Contact name'),
            'logo_path' => Yii::t('app', 'Logo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['idCompany' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['idCompany' => 'idUser']);
    }
}
