<?php

namespace ishop\base;

use ishop\Db;
use Valitron\Validator;

abstract class Model {

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }

    // Загрузка данных для регистрации из формы в модель
    public function load($data){
        foreach($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    // Сохраняет данные в таблицу БД
    public function save($table, $valid = true){
        if($valid){
            $tbl = \R::dispense($table); // отправка
        }else{
            $tbl = \R::xdispense($table); // своя функция для разрешения подчеркиваний в наименовании таблиц
        }
        foreach($this->attributes as $name => $value){
            $tbl->$name = $value;
        }
        return \R::store($tbl); // возвращает либо 0, либо id сохраненного запроса
    }


    // Изменяет данные в таблице БД
    public function update($table, $id){
        $bean = \R::load($table, $id);
        foreach($this->attributes as $name => $value){
            $bean->$name = $value;
        }
        return \R::store($bean);
    }

    // Валидация через Valitron
    public function validate($data){
        Validator::langDir(WWW . '/validator/lang'); // из какой папки брать файлы с языками (по умолчанию composer/..../lang)
        Validator::lang('ru'); // выбор языка
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    // Рендер ошибки
    public function getErrors(){
        $errors = '<ul>';
        foreach($this->errors as $error){
            foreach($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }

}