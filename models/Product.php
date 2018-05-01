<?php
namespace app\models;

/**
 *  Product model class
 */
class Product extends DbModel
{
    protected $id;
    public $category_id;
    public $image_id;
    public $material_id;
    public $price;
    public $product_name;
    public $size;
    public $amount;
    public $color;
    protected $currentProperties = [];
    protected $allowedProperties = [];

    /**
     * Product constructor
     *
     * @param int    $id           - product's ID
     * @param int    $category_id  - product's category ID
     * @param int    $image_id     - product's image ID
     * @param int    $material_id  - product's material ID
     * @param double $price        - product's price
     * @param string $product_name - product's name
     * @param string $size         - product's size
     * @param int    $amount       - product's amount
     * @param string $color        - product's color
     */
    public function __construct(
        $id = null,
        $category_id = null,
        $image_id = null,
        $material_id = null,
        $price = null,
        $product_name = null,
        $size = null,
        $amount = null,
        $color = null
    ) {
        parent::__construct();
        $this->id = $id;
        $this->category_id = $category_id;
        $this->image_id = $image_id;
        $this->material_id = $material_id;
        $this->price = $price;
        $this->product_name = $product_name;
        $this->size = $size;
        $this->amount = $amount;
        $this->color = $color;
    }

    /**
     * Return DB table name
     *
     * @return string
     */
    public static function getTableName() : string
    {
        return 'products';
    }
}
