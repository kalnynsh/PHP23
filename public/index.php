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

// $productAll = Product::getAll();
// var_dump($productAll);

$productId = 12;
$productObjectId12 = Product::getOne($productId);
// $productObjectId12->commit();

// $productObjectId12->price = 12090.0;

// var_dump($productObjectId12->update());

var_dump($productObjectId12);

die();
