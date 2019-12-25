<?php
require_once 'classes/Db.php';
use classes\Db;

// Создаем соединение с БД используя TSingleton
$db = Db::getInstance();

// Метод, который может возвращать данные (SELECT).
$result = $db->find('SELECT * FROM users WHERE id = :id', [':id' => 6]);
print_r($result);

// Метод, который может выполнять sql-запросы
//$db->query('INSERT INTO users (`username`,`email`,`password`) VALUES (:username, :email, :password)', [':username' => 'Александр', ':email' => 'mail@mail.ru', 'password' => '12345']);
//$db->query('DELETE FROM users WHERE id = :id', [':id' => 13]);
//$db->query("UPDATE users SET password = :password WHERE id = :id", [':id' => 9, ':password' => '88888888']);

