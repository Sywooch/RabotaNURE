<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Image;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?php 
        echo Html::img(Image::getImagePath($model->getImage()->one()));
    ?>

    <?= $form->field($model, 'image_id')->fileInput(['accept' => Image::FORMATS]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>