<?php

namespace app\controllers;
use app\models\News;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	//maybe show recent news or so? dunno.
        return $this->render('index');
    }

    public function actionShow()
    {
    	if (isset($_GET['name'])) {
    		$name = $_GET['name'];
    		$lang = \Yii::$app->language;
    		//echo $name . ' - ' .$lang;
    		$model = News::find()
    			->where(
    				['name' => $name, 'lang' => $lang])
    			->one();

    		if ($model !== null) {
    			//var_dump($model);
    			return $this->render('show', ['model' => $model]);
    		}
    	}

        return $this->render('news_not_found');
    }

}
