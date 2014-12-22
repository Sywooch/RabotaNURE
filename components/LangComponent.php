<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class LangComponent extends Component
{
	public function init()
	{
		$current_language = \Yii::$app->session->get('lang');
		\Yii::$app->language = $current_language;
	}
 
}