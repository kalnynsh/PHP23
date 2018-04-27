<?php
namespace app\models;

/**
 *  Comment model class
 */
class Comment extends DbModel
{
    public $id;
    public $user_id;
    public $content;

    protected $allowedProperties = [
        'user_id',
        'content',
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public function getTableName() : string
    {
        return 'comments';
    }
}
