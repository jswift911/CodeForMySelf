<?php

namespace classes;
require_once 'traits/TSingleton.php';
use traits\TSingleton;

class Db {

    use TSingleton;

    // Настройки для соединения с БД
    public $config = [
        'user' => 'root',
        'pass' => '',
        'driver' => 'mysql',
        'bd' => 'kud_gb',
        'host' => 'localhost:3307',
        'charset' => 'UTF8',
    ];

    public $connect = null;

    // Запрос с настройками для PDO
    private function getDSN()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['bd'],
            $this->config['charset']
        );
    }

    // Соединяемся с БД через PDO
    public function getConnect()
    {
        if (empty($this->connect)) {
            $this->connect = new \PDO(
                $this->getDSN(),
                $this->config['user'],
                $this->config['pass']
            );
            $this->connect->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }
        return $this->connect;
    }

    /**
     * Выполнение запроса
     *
     * @param string $sql 'SELECT * FROM users WHERE id = :id'
     * @param array $params [':id' => 123]
     * @return boolean
     */
    public function query(string $sql, array $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        return $PDOStatement->execute($params); // return boolean
    }

    /**
     * Получение одной строки
     *
     * @param string $sql 'SELECT * FROM users WHERE id = :id'
     * @param array $params [':id' => 123]
     * @return array|mixed
     */
    public function find(string $sql, array $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        $res = $PDOStatement->execute($params);
        if($res !== false){
            return $PDOStatement->fetch();
        }
        return [];
    }
}