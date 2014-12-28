<?php

namespace app\controllers;

use app\models\Application;
use app\models\ApplicationContact;
use app\models\ApplicationJob;
use app\models\Configuration;

class FairController extends \yii\web\Controller
{

    public $layout = 'orange_bootstrap';

    public function actionApplication()
    {
        $model = new Application();
        $model_contacts[] = new ApplicationContact();
        $model_jobs[] = new ApplicationJob();

        $user = \Yii::$app->user->getIdentity();
        if ($user != null && $user->getCompany()->one() == null) {
        	$this->render('fair/application_fail', ['error'=>Yii::t('app','Students can not sign up for a fair.')]);
        }
        elseif ($user != null) {
        	$model->name = $user->name;
        	$model->address = $user->address;
        	$model->email = $user->email;
        	$model->website = $user->getCompany()->one()->website;
        	$model->info_email = $user->email;
        	$model->contact_name = $user->getCompany()->one()->contact_name;
        	$model->idCompany = $user->id;
        }
        $model->fair_number = Configuration::find()->where(['name'=>'fair_number'])->one()->value;

	    return $this->render('application', [
	        'model' => $model,
	        'model_contacts' => $model_contacts,
	        'model_jobs' => $model_jobs,
	    ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
