<?php

namespace app\controllers;

use app\models\User;
use ishop\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'Пользователь успешно зарегистрирован!';
                } else {
                    $_SESSION['error'] = 'Ошибка!';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            redirect();
        }
        $this->setMeta('Вход');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

    public function rememberAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            $string = null;
            if(!$user->checkUnique()){
                $symbols_array = ["92", "83", "7", "66", "45", "4", "36", "22", "1", "0",
                    "k", "l", "m", "n", "o", "p", "q", "1r",
                    "3s", "a", "b", "c", "d", "5e", "f", "g", "h",
                    "i", "j6", "t", "u", "v9", "w", "x5", "6y", "z5"];
                for ($k = 0; $k < 8; $k++) {
                    shuffle ($symbols_array);
                    $string = $string.$symbols_array[1];
                }
                $user = \R::findOne("user", "email = ?", [$data['email']]);
                $login = $user->login;
                User::mailRemember($string, $data['email'], $login);
                $newPass = password_hash($string, PASSWORD_DEFAULT);
                \R::exec( "UPDATE user SET password = '{$newPass}' WHERE email = ?", [$data['email']] );
            } else {
                $_SESSION['error'] = 'Такой пользователь не существует';
            }
            redirect(PATH . '/user/login');
        }
        $this->setMeta('Восстановление пароля');
    }

}