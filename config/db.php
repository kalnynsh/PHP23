<?php

/** 
 * PHP education
 * 
 * PHP version 7.2
 * 
 * @category Education_PHP
 * @package  PHP_Education_DB
 * @author   Kalnynsh <kalnynsh@google.com>
 * @license  http://example.com MIT 
 * @link     https://github.com/kalnynsh 
 */

/**
 * Return array of DB connection params
 *
 * @return array
 */
function getConnParams() : array
{
    $host = 'localhost';
    $user = 'd';
    $passw = 'Mc2tu7elq';
    $port = 3306;
    $db_name = 'd_edu01';

    $connectionParams = compact(
        'host',
        'user',
        'passw',
        'port',
        'db_name'
    );

    return $connectionParams;
}
