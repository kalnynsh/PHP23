<?php
namespace app\models;

/**
 *  Category model class
 */
class Category extends Model
{
    public $id;
    public $name;

    protected $allowedProperties = [
        'name',
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public function getTableName() : string
    {
        return 'categories';
    }
}
