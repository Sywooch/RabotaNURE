<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Image;

//TODO: use the NewsForm here

/* @var $this yii\web\View */
/* @var $models[] app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

<h2>Name and image for all three</h2>
    <?= $form->field($models['ru'], 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ru'], 'image_id')->fileInput(['accept' => Image::FORMATS]) ?>
<h2>Ru part</h2>
    <?= $form->field($models['ru'], 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ru'], 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($models['ru'], 'text')->textarea(['rows' => 6]) ?>
<h2>En part</h2>
    <?= $form->field($models['en'], 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['en'], 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($models['en'], 'text')->textarea(['rows' => 6]) ?>
<h2>Ua part</h2>
    <?= $form->field($models['ua'], 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($models['ua'], 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($models['ua'], 'text')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($models['ru']->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
