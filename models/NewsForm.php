<?php 

napespace app\models;

use yii\base\Model;
use app\models\News;
use app\models\Image;

class LoginForm extends Model
{
	public $en_name;
	public $en_title;
	public $en_desc;
	public $en_text;

   	public $ru_name;
	public $ru_title;
	public $ru_desc;
	public $ru_text;

	public $ua_name;
	public $ua_title;
	public $ua_desc;
	public $ua_text;

	public $image;
	private $imageId;

	public function rules() {
		return [
			[['image'] , 'file'],
			[['en_name', 'ru_name', 'ua_name'], 'required']
		];
	}

	//expecting image to be an instance (yii\web\UploadedFile::getInstance)
	public function saveImage() {
		if (!$image) {
			return null;
		}
		$rnd = rand(0,99999);
        //$uploadedFile = UploadedFile::getInstance($model,'picture');
        $fileName = $rnd.'_'.$this->image->name; 
        $filePath = Yii::$app->basePath.'/web/uploads/'.$fileName;
        $this->image->saveAs($filePath);
        $this->image = $filePath;

        $img = new Image();
        $img->source = $this->image;
        if ($img.save()) {
        	$this->imageId = $img->id;
        	return true;
    	}
    	return false;
	}

	public function saveAll() {
		$en_news = new News();
		$ru_news = new News();
		$ua_news = new News();
		$date = date("Y-m-d H:i:s");

		$en_news->name 			= $en_name;
		$en_news->title 		= $en_title;
		$en_news->description 	= $en_desc;
		$en_news->text 			= $en_text;
		$en_news->date 			= $date;
		$en_news->lang 			= 'en-US';

		$ru_news->name 			= $ru_name;
		$ru_news->title 		= $ru_title;
		$ru_news->description 	= $ru_desc;
		$ru_news->text 			= $ru_text;
		$ru_news->date 			= $date;
		$ru_news->lang 			= 'ru-RU';

		$ua_news->name 			= $ua_name;
		$ua_news->title 		= $ua_title;
		$ua_news->description 	= $ua_desc;
		$ua_news->text 			= $ua_text;
		$ua_news->date 			= $date;
		$ua_news->lang 			= 'uk';

		if ($this->imageId) {
			$en_news->image_id = $this->imageId;
			$ru_news->image_id = $this->imageId;
			$ua_news->image_id = $this->imageId;
		}

		if ($en_news->save() && $ru_news->save() && $ua_news->save()) {
			return true;
		}

		return false;
	}


}
