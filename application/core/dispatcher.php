<?php
class Dispatcher
{
    public function __construct(){
		spl_autoload_register(array($this, 'loadClass')); // Autoloader de classes
    }
	
    public function dispatch($controller, $action) {
        $controllerFile = APPLICATION_PATH.'controllers/'.$controller.'/'.$action.'.php';
        $view       	= APPLICATION_PATH.'views/'.$controller.'/'.$action.'.phtml';
		if(file_exists($view)){
        	include($view);
        }
        if(file_exists($controllerFile)){
        	include($controllerFile);
        }

		// // Debug if "Page Not Found"
		// echo 'Controller:';
		// var_dump($controller);
		// echo '<br />';
		// echo 'Action:';
		// var_dump($action);
		// echo '<br />';
		// echo 'ControllerFile:';
		// var_dump($controllerFile);
		// echo '<br />';
		// echo 'ViewFile:';
		// var_dump($view);
		// echo '<br />';
		// echo 'FileExists Controller: ';
		// var_dump(file_exists($controllerFile));
		// echo '<br />';
		// echo 'FileExists View: ';
		// var_dump(file_exists($view));		
    }
    
    public function loadClass($class){
    	require(APPLICATION_PATH.'/models/'.$class.'.php');
    }
}
?>
