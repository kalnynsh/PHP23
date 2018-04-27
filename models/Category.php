<?php
namespace app\models;

/**
 *  Category model class
 */
class Category extends DbModel
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
    public static function getTableName() : string
    {
        return 'categories';
    }
}
