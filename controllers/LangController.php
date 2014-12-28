<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class LangController extends Controller
{
	private $languages = ['ru-RU','en-US','uk'];

	public function actionIndex($lang='ru-RU',$link='/')
	{
		if ($link == '')
			$link = '/';
		if (!in_array($lang,$this->languages))
			$lang = 'ru-RU';
		\Yii::$app->session->set('lang',$lang);
		return $this->redirect($link);//redirect(Url::previous());
	}
}