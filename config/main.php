<?php
header('Content-Type: text/html; charset=utf-8');

/** 
 * Learning PHP
 * 
 * PHP version 7.2
 * 
 * @category Learning_PHP
 * @package  PHP_Config
 * @author   Kalnynsh <kda869@yandex.ru>
 * @license  http://example.com MIT 
 * @link     https://github.com/kalnynsh 
 */

/**
 * Define constant the Path to Document Root
 */
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/..');

/**
 * Define constant the Path to public/
 */
define('PUBLIC_DIR', ROOT_DIR . '/public');

/**
 * Define constant the Path to uploads/
 */
define('UPLOADS_DIR', ROOT_DIR . '/uploads');

/**
 * Define constant the Path to /templates/layouts
 */
define('LAYOUTS_DIR', ROOT_DIR . '/templates/layouts');

/**
 * Define constant the Path to /templates
 */
define('TEMPLATES_DIR', ROOT_DIR . '/templates');

/**
 * Define constant the Path to /vendor
 */
define('VENDOR_DIR', ROOT_DIR . '/vendor');

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', true);
setlocale(LC_ALL, 'ru_RU.UTF-8', 'rus_RUS.UTF-8', 'Russian_Russia.UTF-8');
 