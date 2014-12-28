<?php

namespace app\controllers;

class UserController extends \yii\web\Controller
{

	public $layout = 'orange_bootstrap';

	//TODO : Access only for users

    public function actionAccount()
    {
        return $this->render('account');
    }

}
