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

spl_autoload_register([new Autoloader(), 'loadClass']);
require_once ROOT_DIR . '/vendor/autoload.php';

session_start();

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);
unset($uriParts[0]);
$uriParts = array_values($uriParts);

$controllerName =
    isset($uriParts[0]) &&
    $uriParts[0] !== '' ?
    $uriParts[0] : 'product';

switch ($controllerName) {
    case 'product':
        $controllerClass = CONTROLLERS_NAMESPACE .
            ucfirst($controllerName) .
            'Controller';
        break;

    case 'user':
        $controllerClass = CONTROLLERS_NAMESPACE .
            ucfirst($controllerName) .
            'Controller';
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        die('Error 404');
}

$id = false;

if (isset($uriParts[1]) && is_numeric($uriParts[1])) {
    $id = $uriParts[1];
    $uriParts[1] = 'card';
}

$actionName = isset($uriParts[1]) && $uriParts[1] !== '' &&
    is_string($uriParts[1]) ? $uriParts[1] : 'index';

if (empty($id)) {
    $id =
        isset($uriParts[2]) && is_numeric($uriParts[2]) ?
        $uriParts[2] : false;
}

if ($id) {
    $_GET['id'] = $id;
}

if (class_exists($controllerClass)) {
    /** @var $controller */
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}
