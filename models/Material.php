<?php
namespace app\models;

/**
 *  Material model class
 */
class Material extends DbModel
{
    public $id;
    public $material_name;

    protected $allowedProperties = [
        'material_name',
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public static function getTableName() : string
    {
        return 'materials';
    }
}
