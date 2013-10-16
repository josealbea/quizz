<?php 

define("APPLICATION_PATH", dirname(__FILE__)."/application/");

// PDO Connect
//require APPLICATION_PATH.'configs/connect.php';

require_once APPLICATION_PATH.'conf.php';

// Dispatcher
require_once APPLICATION_PATH.'dispatcher.php';

$controller = isset($_GET['controller'])?$_GET['controller']:'index';
$action = isset($_GET['action'])?$_GET['action']:'index';

include_once APPLICATION_PATH.'controllers/'.$controller.'/'.$action.'.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo PUBLIC_ROOT; ?>css/style.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
</head>
<body>
	<div id="content">
		<?php include_once APPLICATION_PATH.'views/'.$controller.'/'.$action.'.phtml'; ?>
	</div>
</div>
</body>
</html>
