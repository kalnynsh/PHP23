<?php
namespace app\models;

/**
 *  Image model class
 */
class Image extends DbModel
{
    public $id;
    public $image_name;
    public $date_created;
    public $date_updated;

    protected $allowedProperties = [];

    /**
     * Image's constructor
     *
     * @param int    $id           - Image's ID
     * @param string $image_name   - Image's name
     * @param string $date_created - creation date, time 
     * @param string $date_updated - update date, time  
     */
    public function __construct(
        $id = null,
        $image_name = null,
        $date_created = null,
        $date_updated = null
    ) {
        parent::__construct();
        $this->id = $id;
        $this->image_name = $image_name;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
    }

    /**
     * Return DB table name
     *
     * @return string
     */
    public static function getTableName() : string
    {
        return 'images';
    }
}
