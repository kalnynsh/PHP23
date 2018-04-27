<?php
namespace app\models;

/**
 *  Product model class
 */
class Product extends DbModel
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
        'category_id',
        'image_id',
        'material_id',
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
