<?php

namespace app\models;

use ishop\App;

class Category extends AppModel {

    // Для валидации полей valitron'а
    public $attributes = [
        'title' => '',
        'parent_id' => '',
        'keywords' => '',
        'description' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
        ]
    ];

    public function getIds($id){
        $cats = App::$app->getProperty('cats'); // из реестра берем все категории
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }

}