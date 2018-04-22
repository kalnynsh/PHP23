<?php

namespace app\services;

use app\traits\TSingletone;

class Db
{
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shopshop',
        'charset' => 'utf8'
    ];

    /** @var \PDO  */
    private $conn = null;

    private static $instance = null;

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }

        return $this->conn;
    }

    private function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);

        return $pdoStatement;
    }

    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);

        return true;
    }

    // public function queryOne($sql, $params = [])
    // {
    //     return $this->queryAll($sql, $params)[0];
    // }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch(\PDO::FETCH_LAZY)[0];
    }


    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    private function prepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

}
