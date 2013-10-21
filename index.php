<?php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

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