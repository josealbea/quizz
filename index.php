<?php 
define('APPLICATION_PATH', dirname(__FILE__).'/application/');

require_once APPLICATION_PATH.'core/conf.php';
require_once APPLICATION_PATH.'core/dispatcher.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo PUBLIC_ROOT; ?>css/style.css" />
	<script src="<?php echo PUBLIC_ROOT; ?>js/jquery-1.10.2.min.js"></script>
</head>
<body>
	<div id="content">
		<?php
			$dispatcher = new Dispatcher;
		
			$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
			$action     = isset($_GET['action']) ? $_GET['action'] : 'index';
			$id         = isset($_GET['id']) ? $_GET['id'] : -1;
			
			$dispatcher->dispatch($controller, $action); 
		?>
	</div>
</div>
</body>
</html>