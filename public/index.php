<?php

/** 
 * Learning PHP
 * 
 * PHP version 7.2
 * 
 * @category Learning_PHP
 * @package  Main_Page
 * @author   Kalnynsh <kda869@yandex.ru>
 * @license  http://example.com MIT 
 * @link     https://github.com/kalnynsh 
 */

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', true);
setlocale(LC_ALL, 'ru_RU.UTF-8', 'rus_RUS.UTF-8', 'Russian_Russia.UTF-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/app.php';
require_once ROOT_DIR . '/services/Autoloader.php';

use app\services\Autoloader;
use app\models\Product;
use app\models\User;
use app\models\Category;
use app\models\Comment;
use app\models\Image;
use app\models\Material;
use app\models\Order;

spl_autoload_register([new Autoloader(), 'loadClass']);

$productM = new Product();

// $productId = 1;
// $productObjectIdOne = $productM->getOne($productId);

// echo $productObjectIdOne['product_name'] . '<br>';

// var_dump($productObjectIdOne);

//  Get all rows
// $productsAll = $productM->getAll();
// $productColName = $productM->getColumn('product_name');

// Get rows with column 'product_name'
// var_dump($productColName);

// Test for Insert data to products table
// $sourceProduct = [
//     'category_id' => 5,
//     'image_id' => 6,
//     'material_id' => 2,
//     'price' => 12010.0,
//     'product_name' => 'Костюм',
//     'size' => 'XL',
//     'amount' => 213,
//     'color' => 'Светло серый',
// ];

// $productM->setData($sourceProduct);
// $productsAll2 = $productM->getAll();
// $lastId = $productM->getLastInsertId();
// var_dump($lastId);

// Test for DELETE data from products table
// $productId = 9;
// $productM->deleteById($productId);

// Test for UPDATE data in products table
// $sourceProductUpdate = [
//     'price' => 4900.0,
// ];
// $idUpdate = 10;
// $productM->updateData($sourceProductUpdate, $idUpdate);
// $productsAll3 = $productM->getAll();

// Test Category class
// $categoryM = new Category();
// $catIdOne = $categoryM->getOne(1);

// Test Comment class
// $commentM = new Comment();
// $comIdOne = $commentM->getOne(1);

// Test Image class
// $imgM = new Image();
// $imgMidOne = $imgM->getOne(1);

// Test Material class
// $matM = new Material();
// $matMidOne = $matM->getOne(1);

// Test Order class
// $orderM = new Order();
// $orderMidOne = $orderM->getOne(1);

// var_dump($orderMidOne);

// die();
