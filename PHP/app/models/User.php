<?php
namespace app\models;

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
}