<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property string $description
 * @property string $address
 * @property string $email
 * @property string $website
 * @property string $public_info
 * @property integer $practice
 * @property integer $official_sponsor
 * @property integer $multimedia_presentation
 * @property string $info_email
 * @property string $contact_name
 * @property integer $sponsorship_value
 * @property integer $sponsorship_position
 * @property integer $idCompany
 *
 * @property Company $Company
 * @property ApplicationContact[] $applicationContacts
 * @property ApplicationJob[] $applicationJobs
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'description', 'address', 'email', 'website', 'public_info', 'practice', 'official_sponsor', 'info_email', 'contact_name'], 'required'],
            [['description', 'public_info'], 'string'],
            [['practice', 'official_sponsor', 'multimedia_presentation', 'sponsorship_value', 'sponsorship_position', 'idCompany', 'fair_number'], 'integer'],
            [['name', 'address', 'email', 'website', 'info_email', 'contact_name'], 'string', 'max' => 255],
            [['short_name'], 'string', 'max' => 20],
            [['public_info'], 'string', 'max' => 150],
            [['email','info_email'],'email'],
            ['website','url']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Company name'),
            'short_name' => Yii::t('app', 'Short name'),
            'description' => Yii::t('app', 'Company activities'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'E-mail'),
            'website' => Yii::t('app', 'Website'),
            'public_info' => Yii::t('app', 'Public info'),
            'practice' => Yii::t('app', 'Practice for students'),
            'official_sponsor' => Yii::t('app', 'Official sponsorship'),
            'multimedia_presentation' => Yii::t('app', 'Multimedia presentation'),
            'info_email' => Yii::t('app', 'E-mail for notifications'),
            'contact_name' => Yii::t('app', 'Contact name'),
            'sponsorship_value' => Yii::t('app', 'Sponsorship value'),
            'sponsorship_position' => Yii::t('app', 'Sponsorship position'),
            'fair_number' => Yii::t('app', 'Fair number'),
            'idCompany' => Yii::t('app', 'Id Company'),
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
    public function getApplicationContacts()
    {
        return $this->hasMany(ApplicationContact::className(), ['idApplication' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationJobs()
    {
        return $this->hasMany(ApplicationJob::className(), ['idApplication' => 'id']);
    }
}
