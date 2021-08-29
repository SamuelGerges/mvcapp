<?php


namespace PHPMVC\lib;

use PHPMVC\lib\frontController;

if(!defined('DS'))
{
    define('DS',DIRECTORY_SEPARATOR);
}
require_once '..' . DS .'app'.DS  .'config.php';

require_once APP_PATH . DS . 'lib' . DS . 'Autoload.php';

session_start();
$front_controller = new frontController();
$front_controller->dispatch();





