<?php
namespace app\models;

use app\services\Db;

/**
 * Model abstact parent class
 * for User, Product and any model classes
 */
abstract class DbModel
{
    public $id;
    const LIMIT_FROM = 0;
    const PER_PAGE = 6;
    protected $privateProperties = [
        'currentProperties',
        'privateProperties',
        'allowedProperties'
    ];
    protected $currentProperties = [];
    protected $allowedProperties = [];

    /**
     * Static method get connection with DB
     *
     * @return \PDO
     */
    public static function getConn() : \PDO
    {
        return Db::getInstance()->getConnection();
    }

    /**
     * Abstract static method for child classes - get table name
     *
     */
    abstract public static function getTableName();

    /**
     * Get one row of data from DB by ID
     *
     * @param int $id - ID
     *
     */
    public static function getOne(int $id)
    {
        $sql = sprintf(
            'SELECT * FROM `%s` WHERE id = :id',
            static::getTableName()
        );
        $stmt = static::getConn()->prepare($sql);
        $stmt->setFetchMode(
            \PDO::FETCH_CLASS |
                \PDO::FETCH_PROPS_LATE,
            get_called_class()
        );

        $params = [':id' => $id];
        $stmt->execute($params);

        return $stmt->fetch();
    }

    /**
     * Get all row data from DB like objects
     *
     * @return array - of result
     */
    public static function getAll()
    {
        $sql = sprintf(
            'SELECT * FROM `%s` LIMIT :limitFrom, :perPage',
            static::getTableName()
        );
        $stmt = static::getConn()->prepare($sql);
        $stmt->bindValue(':limitFrom', static::LIMIT_FROM, \PDO::PARAM_INT);
        $stmt->bindValue(':perPage', static::PER_PAGE, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(
            \PDO::FETCH_CLASS |
                \PDO::FETCH_PROPS_LATE,
            get_called_class()
        );
    }

    /**
     * Get all data from DB table for column
     *
     * @param string $columnName - column name
     *
     * @return array|bool- result or false
     */
    public function getColumn(string $columnName)
    {
        if (!$this->isAllowed($columnName)) {
            return false;
        }

        $sql = sprintf('SELECT `%s` FROM `%s`', $columnName, static::getTableName());
        $stmt = static::getConn()->query($sql);

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    /**
     * Insert data to DB using class object property
     *
     * @return string - ID of last inserted row
     */
    public function insert() : string
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($this->isPrivate($key)) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = sprintf(
            "INSERT INTO (`%s`) (`%s`) VALUES (%s)",
            $tableName,
            $columns,
            $placeholders
        );

        $stmt = static::getConn()->prepare($sql);
        $stmt->execute($params);

        return static::getLastInsertId();
    }

    /**
     * Save current object properies for next compare
     *
     * @return void
     */
    public function commit()
    {
        foreach ($this as $key => $value) {
            if ($this->isPrivate($key)) {
                continue;
            }
            $this->currentProperties["{$key}"] = $value;
        }
    }

    /**
     * Return last insert ID to DB row that using auto increment
     *
     * @return string
     */
    public static function getLastInsertId() : string
    {
        return static::getConn()->lastInsertId();
    }

    /**
     * Update given data to child class table
     *
     * @return bool
     */
    public function update() : bool
    {
        $oldProperties = $this->currentProperties;

        if (empty($oldProperties)) {
            return false;
        }

        $params[':id'] = $oldProperties['id'];
        $set = '';

        foreach ($this as $key => $value) {
            if ($this->isPrivate($key)) {
                continue;
            }

            if (!$this->isAllowed($key)) {
                return false;
            }

            if ($value !== $oldProperties["{$key}"]) {
                $set .= "`" .
                    "{$key}" .
                    "`" .
                    "= :{$key}, ";
                $params[":{$key}"] = $value;
            }
        }

        $set = substr($set, 0, -2);
        $tableName = static::getTableName();

        $sql = sprintf(
            "UPDATE `%s` SET %s WHERE id = :id",
            $tableName,
            $set
        );

        $stmt = static::getConn()->prepare($sql);
        $stmt->execute($params);

        return true;
    }

    /**
     * Get allowed properties
     *
     * @return array - allowed properties
     */
    protected function getAllowedProperties() : array
    {
        return $this->allowedProperties = array_keys($this->currentProperties);
    }

    /**
     * Delete row of data from DB child class table 
     * by self ID
     *
     * @return bool
     */
    public function delete() : bool
    {
        $id = $this->id;
        $sql = sprintf('DELETE FROM %s WHERE id = :id', static::getTableName());
        $stmt = static::getConn()->prepare($sql);
        $stmt->execute(
            [
                'id' => $id,
            ]
        );

        return true;
    }

    /**
     * Check if given name belongs 
     * to AllowedProperties array
     *
     * @param string $name - property name
     * 
     * @return boolean
     */
    protected function isAllowed(string $name) : bool
    {
        return in_array($name, $this->getAllowedProperties());
    }

    /**
     * Check if given name belongs 
     * to AllowedProperties array
     *
     * @param string $name - property name
     * 
     * @return boolean
     */
    protected function isPrivate(string $name) : bool
    {
        return in_array($name, $this->privateProperties);
    }

}
