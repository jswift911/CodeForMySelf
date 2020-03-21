<?php

namespace ishop;

class Db{

    use TSingleton;

    protected function __construct(){
        $db = require_once CONF . '/config_db.php'; // Подключаем dsn для соединения с БД
        class_alias('\RedBeanPHP\R','\R'); // создает короткий алиас \R
        \R::setup($db['dsn'], $db['user'], $db['pass']); // подключаемся к БД
        if( !\R::testConnection() ){
            throw new \Exception("Нет соединения с БД", 500); // Проверка соединения
        }
        \R::freeze(true); // Запретить RedBean'у изменять автоматически БД
        if(DEBUG){
            \R::debug(true, 1); // Режим отладки
        }

        // Функция для того, чтобы таблицы можно было именовать через подчеркивание
        // В RedBeanPHP через метод ::dispense запрещено использовать подчеркивания в связи с конвенциями.
        // функция из документации RedBeanPHP
        \R::ext('xdispense', function($type){
            return \R::getRedBean()->dispense( $type );
        });
    }

}