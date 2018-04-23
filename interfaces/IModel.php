<?php
namespace app\interfaces;

/**
 * Interfaces for Model
 */
interface IModel
{
    /**
     * Get one row of data from DB by ID
     */
    public function getOne(int $id);

    /**
     * Get all row data from DB
     */
    public function getAll();

    /**
     * Get table name
     */
    public function getTableName();
}
