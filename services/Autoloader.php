<?php

namespace app\services;

require_once $_SERVER['DOCUMENT_ROOT'] . '/..' . '/config/app.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/..' . '/config/main.php';

/**
 * Class using for autoload classes
 */
class Autoloader
{
    private $_fileExtension = ".php";

    /**
     * Include class
     *
     * @param string $className - class name
     * 
     * @return bool
     */
    public function loadClass($className)
    {
        $className = str_replace(
            [APP_NAME . '\\', '\\'],
            [ROOT_DIR, DIRECTORY_SEPARATOR],
            $className
        );
        $className .= $this->_fileExtension;

        if (file_exists($className)) {
            include $className;
            return true;
        }

        echo 'File or class not exists';
        return false;
    }
}
