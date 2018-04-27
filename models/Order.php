<?php
namespace app\models;

/**
 *  Order model class
 */
class Order extends DbModel
{
    public $id;
    public $order_number;
    public $product_amount;
    public $product_id;
    public $user_id;
    public $created_at;

    protected $allowedProperties = [
        'order_number',
        'product_amount',
        'product_id',
        'user_id',
        'created_at',
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public static function getTableName() : string
    {
        return 'orders';
    }
}
