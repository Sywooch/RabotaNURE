<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $date
 * @property string $skype
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property integer $role
 *
 * @property Company $company
 * @property Student $student
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const ROLE_STUDENT = 1;
    const ROLE_COMPANY = 2;
    const ROLE_ADMIN = 10;

    public $confirmation;

    public static function findIdentity($id)
    {
        $user = User::find()->where(['id'=>$id,'status'=>1])->one();
        return $user;   
    }

    public static function findIdentityByAccessToken($token, $type=null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        $user = static::find()
        ->where(['login' => $username,'status'=>1])
        ->one();
        return $user!=null ? new static($user) : null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === sha1($authKey);
    }

    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public function validateRole($role)
    {
        if ($role == ROLE_ADMIN)
            return ROLE_ADMIN == $this->role;
        elseif ($role == ROLE_COMPANY)
            return ROLE_COMPANY == $this->role;
        elseif ($role == ROLE_STUDENT)
            return ROLE_STUDENT == $this->role;
        else
            return false; 
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'confirmation', 'name', 'email', 'role'], 'required'],
            [['date'], 'safe'],
            [['status', 'role'], 'integer'],
            [['login', 'password', 'confirmation', 'name', 'email', 'skype', 'phone', 'address'], 'string', 'max' => 255],
            ['email','email'],
            [['login'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'login' => Yii::t('app', 'Login'),
            'password' => Yii::t('app', 'Password'),
            'confirmation' => Yii::t('app', 'Password confirmation'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'E-mail'),
            'date' => Yii::t('app', 'Date'),
            'skype' => Yii::t('app', 'Skype'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    public function getRoleName()
    {
        switch ($this->role) {
            case ROLE_STUDENT : return Yii::t('app','student'); break;
            case ROLE_COMPANY : return Yii::t('app','company'); break;
            case ROLE_ADMIN : return Yii::t('app','student'); break;
            //default : return Yii::t('app','guest'); break;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['idUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['idUser' => 'id']);
    }

    public function register()
    {
        if ($this->password != $this->confirmation) {
            $this->password = '';
            $this->confirmation = '';
            $this->addError('password',Yii::t('app','Entered password and confirmation does not match.'));
            return false;
        }
        $this->password = sha1($this->password);
        if (!$this->save()) {
            $this->password = '';
            $this->confirmation = '';
            return false;
        }
        else
            return true;
    }

    public function beforeSave($insert) 
    {
        if(!isset($this->date)) 
            $this->date = date("Y-m-d");
        return parent::beforeSave($insert);
    }

}
