<?php
namespace app\models;

/**
 *  Image model class
 */
class Image extends Model
{
    public $id;
    public $image_name;
    public $date_created;
    public $date_updated;

    protected $allowedProperties = [
        'image_name',
        'date_created',
        'date_updated',
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public function getTableName() : string
    {
        return 'images';
    }
}