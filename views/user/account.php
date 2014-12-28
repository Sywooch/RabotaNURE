<?php
/* @var $this yii\web\View */
?>
<h2><?=Yii::t('app','User account')?></h2>

<p>
    <?=Yii::t('app',"Hello, {user_name}!",['user_name'=>\Yii::$app->user->getIdentity()->name])?>
</p>
<p>
Your role is: <?=\Yii::$app->user->getIdentity()->getRole()//getRoleName() TODO?>.
</p>
