<?php

namespace app\services;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/db.php';

/**
 * Class DB manage database using \PDO
 */
class Db
{
    private $_config = [
        'driver' => DB_CONNECTION,
        'host' => DB_HOST,
        'login' => DB_USERNAME,
        'password' => DB_PASSWORD,
        'database' => DB_DATABASE,
        'charset' => 'utf8'
    ];

    /** 
     * @var \PDO $_conn - \PDO object 
     */
    private $_conn = null;
    private static $_instance = null;

    /**
     * Return only one instance of Db class
     * Usage Db::getInstance() 
     * 
     * @return \PDO    
     */
    public static function getInstance()
    {
        if (is_null(static::$_instance)) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    /**
     * Get new PDO object if $_conn == null
     * else get existing \PDO $_conn
     *
     * @return \PDO
     */
    public function getConnection() : \PDO
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
     * Prepare Dsn param for init \PDO
     *
     * @return string
     */
    private function _prepareDsnString() : string
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->_config['driver'],
            $this->_config['host'],
            $this->_config['database'],
            $this->_config['charset']
        );
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
