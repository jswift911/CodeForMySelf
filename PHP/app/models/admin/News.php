<?php

namespace app\models\admin;

use app\models\AppModel;

class News extends AppModel {

    public $attributes = [
        'title' => '',
        'text' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['text'],
        ],
    ];


}