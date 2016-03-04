<?php // Directory separator is set up here because separators are different on Linux and Windows operating systems 
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__)); 
//define('ROOT', dirname(dirname(__FILE__)));
$url = @$_GET['url']; // can be undefined so uses default controller
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');


