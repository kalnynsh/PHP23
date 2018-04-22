<?php

namespace app\services;

use app\traits\TSingletone;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/db.php';

/**
 * Class DB manage database throw \PDO
 */
class Db
{
    use TSingletone;

    private $_config = [
        'driver' => DB_CONNECTION,
        'host' => DB_HOST,
        'login' => DB_USERNAME,
        'password' => DB_PASSWORD,
        'database' => DB_DATABASE,
        'charset' => 'utf8'
    ];

    /** 
     * @var \PDO - PDO object 
     */
    private $_conn = null;

    private static $_instance = null;

    /**
     * Get new PDO object
     *
     * @return \PDO
     */
    private function _getConnection() : \PDO
    {
        if (is_null($this->_conn)) {
            $this->_conn = new \PDO(
                $this->_prepareDsnString(),
                $this->_config['login'],
                $this->_config['password']
            );

            $this->_conn->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );

            $this->_conn->setAttribute(
                \PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION
            );
        }

        return $this->_conn;
    }
    /**
     * Prepare and execute query with \PDO
     *
     * @param string $sql    - SQL statement
     * @param array  $params - ['key'=>$value]
     * 
     * @return \PDO statement
     */
    private function _query(string $sql, array $params)
    {
        $pdoStatement = $this->_getConnection()->prepare($sql);
        $pdoStatement->execute($params);

        return $pdoStatement;
    }

    /**
     * Execute query DB with \PDO
     *
     * @param string $sql    - SQL statement
     * @param array  $params - ['key'=>$value]
     * 
     * @return bool
     */
    public function execute(string $sql, array $params = []) : bool
    {
        $this->_query($sql, $params);

        return true;
    }

    /**
     * Fetch one row object from DB
     *
     * @param string $sql    - SQL statement
     * @param array  $params - ['key'=>$value]
     * 
     * @return \PDORow - PDO row object 
     */
    public function queryOne(string $sql, array $params = [])
    {
        return $this->_query($sql, $params)->fetch(\PDO::FETCH_LAZY);
    }

    /**
     * Fetch all DB row like array
     *
     * @param string $sql    - SQL statement
     * @param array  $params - ['key'=>$value]
     * 
     * @return array - ASSOC array
     */
    public function queryAll(string $sql, array $params = [])
    {
        return $this->_query($sql, $params)->fetchAll();
    }

    /**
     * Prepare Dsn param for init \PDO
     *
     * @return string
     */
    private function _prepareDsnString() : string
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
