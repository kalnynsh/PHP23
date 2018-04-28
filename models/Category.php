<?php
namespace app\models;

/**
 *  Category model class
 */
class Category extends DbModel
{
    public $id;
    public $name;
    protected $allowedProperties = [];

    /**
     * Category constructor
     *
     * @param int    $id   - category's ID
     * @param string $name - category's nam
     */
    public function __construct(
        $id = null,
        $name = null
    ) {
        $this->id = $id;
        $this->name = $name;
    }

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
