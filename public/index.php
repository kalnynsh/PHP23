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
// use app\models\Product;
// use app\models\User;
// use app\models\Category;
// use app\models\Comment;
// use app\models\Image;
// use app\models\Material;
// use app\models\Order;

spl_autoload_register([new Autoloader(), 'loadClass']);

$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'] ?? 'index';

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /** @var $controller */
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}
