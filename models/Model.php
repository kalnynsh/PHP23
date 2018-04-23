<?php
namespace app\models;

use app\services\Db;

/**
 * Model abstact parent class
 * for User, Product and any model classes
 */
abstract class Model
{
    protected $db;
    protected $limitFrom = 0;
    protected $perPage = 6;
    protected $allowedProperties = [];

    /**
     * Model constructor - assign db only one instance of Db class
     *
     */
    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }

    /**
     * Abstract method for child classes - get table name
     *
     */
    abstract public function getTableName();

    /**
     * Get one row of data from DB by ID
     *
     * @param int $id - ID
     *
     */
    public function getOne(int $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->getTableName());
        $stmt = $this->db->prepare($sql);
        $params = ['id' => $id];

        $stmt->execute($params);

        return $stmt->fetch(\PDO::FETCH_LAZY);
    }

    /**
     * Get all row data from DB
     *
     * @return array - of result
     */
    public function getAll()
    {
        $sql = sprintf(
            'SELECT * FROM %s LIMIT :limitFrom, :perPage',
            $this->getTableName()
        );
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('limitFrom', $this->limitFrom, \PDO::PARAM_INT);
        $stmt->bindValue('perPage', $this->perPage, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
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
        if (in_array($columnName, $this->allowedProperties) === false) {
            return false;
        }

        $sql = sprintf('SELECT %s FROM %s', $columnName, $this->getTableName());
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    /**
     * Insert given data to child class table
     *
     * @param array $source - array of source
     *
     * @return bool
     */
    public function setData(array $source) : bool
    {
        $allowed = $this->allowedProperties;

        if (!$allowed) {
            return false;
        }

        $set = '';
        $values = [];

        foreach ($allowed as $field) {
            if (isset($source[$field])) {
                $set .= "`" .
                    str_replace("`", "``", $field) .
                    "`" .
                    "=:$field, ";
                $values[$field] = $source[$field];
            }
        }

        $set = substr($set, 0, -2);
        $sql = sprintf("INSERT INTO %s SET %s", $this->getTableName(), $set);

        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);

        return true;
    }
    /**
     * Set allowed properties
     *
     * @param array $allowed - allowed properties
     *
     * @return void
     */
    public function setAllowedProperties(array $allowed)
    {
        $this->allowedProperties = $allowed;
    }

    /**
     * Get allowed properties
     *
     * @return array - allowed properties
     */
    public function getAllowedProperties() : array
    {
        return $this->allowedProperties;
    }

}
