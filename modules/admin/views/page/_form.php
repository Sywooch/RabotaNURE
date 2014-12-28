<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Image;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<h2>Name and image for all three</h2>
    <?= $form->field($models['ru'], '[ru]name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ru'], '[ru]image_id')->fileInput(['accept' => Image::FORMATS]) ?>
<h2>Ru part</h2>
    <?= $form->field($models['ru'], '[ru]title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ru'], '[ru]text')->textarea(['rows' => 6]) ?>
<h2>En part</h2>
    <?= $form->field($models['en'], '[en]title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['en'], '[en]text')->textarea(['rows' => 6]) ?>
<h2>Ua part</h2>
    <?= $form->field($models['ua'], '[ua]title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ua'], '[ua]text')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($models['ru']->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
