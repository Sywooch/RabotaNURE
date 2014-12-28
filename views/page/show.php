<?php
/* @var $this yii\web\View */
/* @var $model app\models\Page */
use yii\helpers\Html;
use app\models\Image;
?>

<h2><?= $model->title ?></h2>
<h2><?= $model->text ?></h2>
<h2><?= Html::img(Image::getImagePath($model->getImage()->one())) ?></h2>
