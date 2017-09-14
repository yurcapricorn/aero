<?php

namespace App\Controllers;

use App\Components\Authorisation;
use App\Models\User;

/**
 * Class Authenticate
 * @package App\Controllers
 */
class Authenticate extends Controller
{
    /**
     * default
     */
    public function actionDefault()
    {
        $this->view->display(__DIR__ . '/../../views/registration.php');
    }

    /**
     * login
     */
    public function actionLogin()
    {
        $this->view->display(__DIR__ . '/../../views/login.php');
    }

    /**
     * register
     */
    public function actionRegister()
    {

        if ($_POST['password'] !== $_POST['confirm_password']) {
            throw new \Exception('пароли не совпадают');
        };
        if (empty($_POST['email'])) {
            throw new \Exception('почта должна быть заполнена');
        }
        $auth = new Authorisation();
        if (!empty($auth->isEmailExist($_POST['email']))) {
            throw new \Exception('пользователь с такой почтой уже существует');
        }

        $user = new User();

        foreach ($_POST as $property => $value) {
            if ($property === 'confirm_password') {
                continue;
            }
            if ($property === 'password') {
                $user->password = password_hash($value, PASSWORD_DEFAULT);
                continue;
            }
            $user->$property = $value;
        }

        $user_id = $user->save();
        $auth->setUserSession($user_id);

        header('Location: /');
//        $this->view->display(__DIR__ . '/../../views/default/index.php');
    }

    /**
     * authorise
     */
    public function actionAuthorise()
    {
        $auth = new Authorisation();
        $user_id = $auth->authenticate($_POST['email'], $_POST['password']);
        if (false !== $user_id) {
            $auth->setUserSession($user_id);
            echo 'вы авторизованы, ваш id= ' . $user_id;
        } else {
            echo 'такого пользователя нет';
        }

    }

    /**
     * is authorised
     * @return bool
     */
    public
    function actionIsAuthorised()
    {
        $auth = new Authorisation();
        $user = $auth->getCurrentUser();
        if (empty($user)) {
            return false;
        } else {
            $auth->setUserSession($user['id']);
            $template = __DIR__ . '/../../../templates/auth/default.php';
            $this->view->user = $user;
            $this->view->display($template);
        }
    }
}
