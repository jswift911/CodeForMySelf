<?php
namespace app\models;

use ishop\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class User extends AppModel {

    // Получаемые введенные данные из формы регистрации
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];

    // Массив правил для Valitron
    public $rules = [
        // Какие поля валидировать
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address'],
        ],
        // Валидация email
        'email' => [
            ['email'],
        ],
        // Минимальная длина
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    // Существует ли email или login в БД
    public function checkUnique(){
        $user = \R::findOne('user', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
        if($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }
        return true;
    }

    // Авторизация
    public function login($isAdmin = false){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if($isAdmin){
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            }else{
                $user = \R::findOne('user', "login = ?", [$login]);
            }
            if($user){
                if(password_verify($password, $user->password)){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

    public static function mailRemember($string, $user_email, $login){
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Создаем письмо
        ob_start();
        require APP . '/views/mail/mail_remember.php';
        $body = ob_get_clean(); // Вся html-разметка из вида mail_remember.php

        // Письмо клиента
        $message_client = (new Swift_Message("Ваш пароль на сайте " . App::$app->getProperty('shop_name')))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;


        // Отправка сообщения
        $result = $mailer->send($message_client);

        // Очистка данных
        unset($user_email);
        unset($string);
        unset($login);
        $_SESSION['success'] = 'Новый пароль отправлен на Ваш email';

    }
}