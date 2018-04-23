<?php
namespace app\models;

/**
 *  Material model class
 */
class Material extends Model
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
    public function getTableName() : string
    {
        return 'materials';
    }
}
