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
    protected $allowedProperties = [];

    /**
     * Order's constructor
     *
     * @param int    $id             - order's ID
     * @param string $order_number   - order's number
     * @param string $product_amount - product's number 
     * @param string $product_id     - product's ID 
     * @param string $user_id        - user's ID
     * @param string $created_at     - creation date, time
     */
    public function __construct(
        $id = null,
        $order_number = null,
        $product_amount = null,
        $product_id = null,
        $user_id = null,
        $created_at = null
    ) {
        $this->id = $id;
        $this->order_number = $order_number;
        $this->product_amount = $product_amount;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
    }

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
