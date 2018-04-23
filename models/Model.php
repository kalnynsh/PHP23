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
    const LIMIT = 6;
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
            'SELECT * FROM %s LIMIT %s',
            $this->getTableName(),
            self::LIMIT
        );
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Abstract method for child classes - get table name
     *
     */
    abstract public function getTableName();

}
