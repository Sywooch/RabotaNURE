<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $role_model app\models\Company */
/* @var $form ActiveForm */

$this->title = Yii::t('app','Company registration');
?>
<div class="site-registration_company">

<h2><?=Yii::t('app', 'Company registration')?></h2><br>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirmation')->passwordInput() ?>
        <?= $form->field($model, 'name', ['labelOptions'=>['label'=>Yii::t('app','Company name'),'class'=>'control-label']]) ?>
        <?= $form->field($model, 'email') ?>
        <?= Html::activeHiddenInput($model, 'role')?>
        <?= $form->field($model, 'skype') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'address') ?>


        <?= $form->field($role_model, 'website') ?>
        <?= $form->field($role_model, 'contact_name') ?>
        <?= $form->field($role_model, 'logo_path')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-registration_company -->
