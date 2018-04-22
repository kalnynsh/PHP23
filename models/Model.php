<?php
namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $db;

    /**
     * Product constructor - init $db 
     *
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $params = ['id' => $id];

        return $this->db->queryOne($sql, $params);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();

}
