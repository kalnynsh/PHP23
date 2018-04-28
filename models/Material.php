<?php
namespace app\models;

/**
 *  Material model class
 */
class Material extends DbModel
{
    public $id;
    public $material_name;

    protected $allowedProperties = [];

    /**
     * Material's constructor
     *
     * @param int    $id            - Material's ID
     * @param string $material_name - Material's name
     */
    public function __construct(
        $id = null,
        $material_name = null
    ) {
        $this->id = $id;
        $this->material_name = $material_name;
    }

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
