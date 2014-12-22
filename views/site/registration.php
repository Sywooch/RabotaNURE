<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::t('app','Registration');
?>
<div class="registration text-center">

<h2><?=Yii::t('app','Registration')?></h2><br>

   <div class="row">
       
        <div class="col-md-6">
            <div class="thumbnail">
                <a href="<?=Url::to(['site/registration','role'=>'student'])?>"><img src="/images/student_registration.jpg" alt="<?=Yii::t('app','Student registration')?>" /></a>
                <div class="caption text-center">
                    <a href="<?=Url::to(['site/registration','role'=>'student'])?>"><h3 style="margin:0; padding:0;"><?=Yii::t('app','Student registration')?></h3></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="thumbnail">
                <a href="<?=Url::to(['site/registration','role'=>'company'])?>"><img src="/images/company_registration.png" alt="<?=Yii::t('app','Company registration')?>" /></a>
                <div class="caption text-center">
                    <a href="<?=Url::to(['site/registration','role'=>'company'])?>"><h3 style="margin:0; padding:0;"><?=Yii::t('app','Company registration')?></h3></a>
                </div>
            </div>
        </div>

   </div>

</div><!-- registration -->
