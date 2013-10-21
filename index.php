<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('SITE_NAME', 'Open ESGI Quizz');

// Database access
define('DB', 'mysql:dbname=facebook;host=localhost;charset=utf8');
define('USER', 'root');
define('PASSWORD', 'root');

// Facebook configuration
define('APPID', '194744407377894');
define('APPSECRET', '18559abeb6be6a8c8a26a60bd645d1fb');
define('PAGEID', '535494466533197');

require_once(ROOT.'core/model.php');
require_once(ROOT.'core/controller.php');
require_once(ROOT.'core/facebook.php');


$params     = explode('/', $_GET['p']);
$controller = !empty($params[0]) ? $params[0] : 'index';
$action     = isset($params[1]) ? $params[1] : 'index';

if(file_exists('controllers/'.$controller.'.php')){
	require_once('controllers/'.$controller.'.php');
}else{
	echo '404 Not Found';
}

date_default_timezone_set("Europe/Paris");  

$controller = new $controller;

if(method_exists($controller, $action.'Action')){
	unset($params[0]);
	unset($params[1]);
	call_user_func_array(array($controller, $action.'Action'), $params);
}else{
	echo '404 not found';
}