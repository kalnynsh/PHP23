<?php
header('Content-Type: text/html; charset=utf-8');

/** 
 * PHP education
 * 
 * PHP version 7.2
 * 
 * @category Education_PHP
 * @package  PHP_Education_Config
 * @author   Kalnynsh <kalnynsh@google.com>
 * @license  http://example.com MIT 
 * @link     https://github.com/kalnynsh 
 */

/**
 * Define constant the Path to Document Root
 */
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/..');

/**
 * Define constant the Path to partials
 */
// define('PARTIALS_PATH', ROOT_DIR . '/templates/layouts/patials');

/**
 * Define constant the Path to header partial
 */
// define('HEADER_PATH', ROOT_DIR . '/templates/layouts/patials/header.php');

/**
 * Define constant the Path to content partial
 */
// define('CONTENT_PATH', ROOT_DIR . '/templates/layouts/patials/content.php');

/**
 * Define constant the Path to footer partial
 */
// define('FOOTER_PATH', ROOT_DIR . '/templates/layouts/patials/footer.php');

/**
 * Define constant the Path to common data
 */
// define('COMMON_DATA', ROOT_DIR . '/templates/layouts/common_data.php');

/**
 * Define constant the Path to public/
 */
define('PUBLIC_DIR', ROOT_DIR . '/public');

/**
 * Define constant the Path to engine/
 */
define('ENGINE_DIR', ROOT_DIR . '/engine');

/**
 * Define constant the Path to uploads/
 */
define('UPLOADS_DIR', ROOT_DIR . '/uploads');

/**
 * Define constant the Path to /public/images
 */
define('IMAGES_DIR', ROOT_DIR . '/public/images');

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
 