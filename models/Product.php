<?php
namespace app\models;

/**
 *  Product model class
 */
class Product extends Model
{
    public $id;
    public $id_category;
    public $id_image;
    public $id_material;

    public $price;
    public $product_name;
    public $size;

    public $amount;
    public $color;
    protected $allowedProperties = [
        'id_category',
        'id_image',
        'id_material',
        'price',
        'product_name',
        'size',
        'amount',
        'color'
    ];

    /**
     * Return DB table name
     *
     * @return string
     */
    public function getTableName() : string
    {
        return 'products';
    }
}
