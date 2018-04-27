<?php
namespace app\models;
/**
 *  User model class
 */
class User extends DbModel
{
    public $id;
    public $login;
    public $name;
    public $password;
    public $last_login;

    protected $allowedProperties = [
        'login',
        'name',
        'password',
        'last_login'
    ];

    /**
     * Get DB table name
     *
     * @return void
     */
    public static function getTableName()
    {
        return 'users';
    }
}
