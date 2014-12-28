<?php

namespace app\controllers;
use app\models\Page;

class PageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionShow()
    {
    	if (isset($_GET['name'])) {
    		$name = $_GET['name'];
    		$lang = \Yii::$app->language;
    		//echo $name . ' - ' .$lang;
    		$model = Page::find()
    			->where(
    				['name' => $name, 'lang' => $lang])
    			->one();

    		if ($model !== null) {
    			//var_dump($model);
    			return $this->render('show', ['model' => $model]);
    		}
    	}

        return $this->render('page_not_found');
    }

}
