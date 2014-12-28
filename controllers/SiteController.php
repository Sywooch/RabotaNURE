<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Company;
use app\models\Student;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public $layout = 'orange_bootstrap';
    private $image_array = ['image/gif', 'image/jpeg', 'image/png', 'images/jpg'];

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->redirect(\Yii::$app->user->getReturnUrl());
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegistration($role='')
    {
        if (!\Yii::$app->user->isGuest) {
            $this->redirect(\Yii::$app->user->getReturnUrl());
        }  
        if ($role=='')
            return $this->render('registration');
        $model = new User();
        $role_model = new Company();
        $model->role = User::ROLE_COMPANY;
        if ($role!='company') {  //Student registration
            $role = 'student';
            $role_model = new Student();
            $model->role = User::ROLE_STUDENT;
        }
        
        if ($model->load(Yii::$app->request->post()) && $role_model->load(Yii::$app->request->post()) && $model->register()) {
            if ($role == 'student') {
                $role_model->idUser = $model->id;
                if ($role_model->save())
                    return $this->render('registration_student_success', ['model' => $model]);
            }
            else {
                $role_model->idUser = $model->id;
                //Upload logo
                if (isset($_FILES['Company']) && $_FILES['Company']['name']['logo_path']!="") {
                    if (!in_array($_FILES['Company']['type']['logo_path'],$this->image_array))
                        $role_model->addError('logo_path','Доступные расширения для файла: jpg, gif, png.');
                    else
                    {
                        $rnd = rand(0,9999);
                        $uploadedFile = UploadedFile::getInstance($role_model,'logo_path');
                        $fileName = 'files/'.$rnd.'_'.$uploadedFile->name;
                        $role_model->logo_path = $fileName;
                        $uploadedFile->saveAs($fileName);
                    }
                }

                if ($role_model->save())
                    return $this->render('registration_company_success', ['model' => $model]);
            }
        }
        return $this->render('registration_'.$role, ['model' => $model, 'role_model' => $role_model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->redirect(\Yii::$app->user->getReturnUrl());
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
