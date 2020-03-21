<?php

namespace app\models\admin;

use app\models\AppModel;

class FilterGroup extends AppModel{

    // Параметры для валидации
    public $attributes = [
        'title' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
        ],
    ];

}