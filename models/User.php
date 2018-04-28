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
     * User's constractor
     *
     * @param int    $id         - user's ID
     * @param string $login      - user's login
     * @param string $name       - user's name
     * @param string $password   - password
     * @param string $last_login - date of las login
     */
    public function __construct(
        $id = null,
        $login = null,
        $name = null,
        $password = null,
        $last_login = null
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
        $this->last_login = $last_login;
    }

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
