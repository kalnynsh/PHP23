<?php

/** 
 * PHP education
 * 
 * PHP version 7.2
 * 
 * @category Education_PHP
 * @package  PHP_Education_Main_Page
 * @author   Kalnynsh <kalnynsh@google.com>
 * @license  http://example.com MIT 
 * @link     https://github.com/kalnynsh 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
require_once ENGINE_DIR . '/autoload.php';

$usename = getUsername();
$products = getAllProducts();

echo renderMainTemplate(
    'catalog',
    [
        'products' => $products,
        'usename' => $usename,
    ]
);
