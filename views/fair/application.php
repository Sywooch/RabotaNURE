<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Application */
/* @var $model_contacts app\models\ApplicationContact */
/* @var $model_jobs app\models\ApplicationJob */
/* @var $form ActiveForm */
$this->title = Yii::t('app', 'Fair application');
?>
<div class="fair-application">


<h2><?=Yii::t('app', 'Fair application')?></h2><br>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row application-form">
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'name')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Название организации
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'short_name')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Сокращенное название для надписи на табличке (не более 20 знаков)
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'description')->textarea() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Вид деятельности организации
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'address')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Адрес организации (индекс, город, улица, телефон, ФИО руководителя)
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'email')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    E-mail
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'website')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Сайт - URL (например: http://www.google.com/)
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'public_info')->textarea(['style'=>'height:9em;']) ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Просим Вас подготовить краткую информацию рекламного характера о Вашей ОРГАНИЗАЦИИ для публикации в рекламно-информационном каталоге Ярмарки Вакансий. Объем текста в каталоге до 150 слов. Данная информация предоставляется в электронном виде и будет распространена среди студентов и отображена на этом сайте в течение года.
Укажите контактную информацию для студентов по вопросам возможного трудоустройства (тел. и e-mail менеджера по персоналу).
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-3 col-sm-3">
	        <?= $form->field($model, 'practice')->radioList(['0'=>Yii::t('yii','No'),'1'=>Yii::t('yii','Yes')]) ?>
	    </div>
	    <div class="col-md-9 col-sm-9 application-field-description">
	    Укажите, пожалуйста, возможность прохождения практики студентами ХНУРЭ 3 и 5 курсов в Вашей ОРГАНИЗАЦИИ
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-3 col-sm-3">
	        <?= $form->field($model, 'official_sponsor')->radioList(['0'=>Yii::t('yii','No'),'1'=>Yii::t('yii','Yes')]) ?>
	    </div>
	    <div class="col-md-9 col-sm-9 application-field-description">
	    Желает ли организация выступить в качестве официального спонсора Ярмарки Вакансий
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-3 col-sm-3">
	        <?= $form->field($model, 'multimedia_presentation')->radioList(['0'=>Yii::t('yii','No'),'1'=>Yii::t('yii','Yes')]) ?>
	    </div>
	    <div class="col-md-9 col-sm-9 application-field-description">
	    Будет ли Ваша организация проводить рекламную презентацию в мультимедийном зале ХНУРЭ (только для спонсоров)
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'info_email')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Укажите E-mail, на который Вы хотели бы получать автоматическое уведомление о регистрации анкеты на Ярмарке Вакансий и новости
	    </div>
    </div>
    <div class="col-md-12 col-sm-12">
	    <div class="col-md-7 col-sm-7">
	        <?= $form->field($model, 'contact_name')->textInput() ?>
	    </div>
	    <div class="col-md-5 col-sm-5 application-field-description">
	    Укажите контактное имя
	    </div>
    </div>
        <?= Html::activeHiddenInput($model, 'fair_number') ?>
        <?= Html::activeHiddenInput($model, 'idCompany') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- fair-application -->
