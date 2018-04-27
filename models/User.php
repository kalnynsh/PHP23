<?php
namespace app\models;

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

    public function getTableName()
    {
        return 'users';
    }
}
