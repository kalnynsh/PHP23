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
require_once ROOT_DIR . '/services/Autoloader.php';

use app\services\Autoloader;
use app\models\Product;
use app\models\User;

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
//     'id_category' => 8,
//     'id_image' => 2,
//     'id_material' => 2,
//     'price' => 5150.0,
//     'product_name' => 'Платье',
//     'size' => 'S',
//     'amount' => 140,
//     'color' => 'С вышевкой',
// ];

// $productM->setData($sourceProduct);
// $productsAll2 = $productM->getAll();

// Test for DELETE data from products table
// $productId = 9;
// $productM->deleteById($productId);

// Test for UPDATE data in products table
// $sourceProductUpdate = [
//     'price' => 4900.0,
// ];
// $idUpdate = 10;
// $productM->updateData($sourceProductUpdate, $idUpdate);

$productsAll3 = $productM->getAll();

var_dump($productsAll3);

die();

