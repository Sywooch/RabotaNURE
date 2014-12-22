<?php
namespace app\rbac;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use app\models\User;
class UserRoleRule extends Rule
{
    public $name = 'userRole';
    public function execute($user, $item, $params)
    {
        //Получаем массив пользователя из базы
        $user = ArrayHelper::getValue($params, 'user', User::findIdentity($user));
        if ($user) {
            $role = $user->role; //Значение из поля role базы данных
            if ($item->name === 'administrator') {
                return $role == User::ROLE_ADMIN;
            } elseif ($item->name === 'company') {
                return $role == User::ROLE_COMPANY;
            } elseif ($item->name === 'student') {
                return $role == User::ROLE_STUDENT;
            }
        }
        return false;
    }
}