<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-registration_student">

<h2><?=Yii::t('app', 'Student registration')?></h2><br>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= Html::activeHiddenInput($model, 'role')?>
        <?= $form->field($model, 'skype') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'address') ?>


        <?= $form->field($role_model, 'ticket') ?>
        <?= $form->field($role_model, 'group') ?>
        <?= $form->field($role_model, 'birth_date') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-registration_student -->
