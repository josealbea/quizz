<?php 
define('APPLICATION_PATH', dirname(__FILE__).'/application/');

require_once APPLICATION_PATH.'core/conf.php';
require_once APPLICATION_PATH.'core/dispatcher.php';
require_once APPLICATION_PATH.'core/facebook.php';

global $user_id, $facebook;
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
	<!-- Facebook loading -->
	<div id="fb-root"></div>
	<script>
	window.fbAsyncInit = function() {
		// init the FB JS SDK
		FB.init({
		appId      : '<?php echo APPID; ?>',                    	    		// App ID from the app dashboard
		channelUrl : '<?php echo SITE_ROOT; ?>application/core/channel.php', 	// Channel file for x-domain comms
		status     : true,                                 						// Check Facebook Login status
		xfbml      : true,                                	 					// Look for social plugins on the page
		cookie	   : true														// Allow the app to refresh
		});

		// Check if the user is logged in
		FB.getLoginStatus(function(response) {
		if (response.status !== 'connected') {
			// The user isn't logged in to Facebook.
			FB.login(function(response){
				console.log('not connected');
				window.location.reload();
			}, {scope: 'email,user_likes,user_location'}
			);
		}else {
			// The user is logged in to Facebook and has authentificated the app
			var uid = response.authResponse.userID;
			var accessToken = response.authResponse.accessToken;
			console.log('connected - uid = ' + uid);
		}	
		});
	};

	// Load the SDK asynchronously
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- End of facebook loading -->

	<div id="content">
		<?php
		$config = array();
		$config['appId'] = APPID;
		$config['secret'] = APPSECRET;

		$facebook = new Facebook($config);

		$user_id = $facebook->getUser();

		if($user_id){
			$dispatcher = new Dispatcher;
		
			$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
			$action     = isset($_GET['action']) ? $_GET['action'] : 'index';
			
			$dispatcher->dispatch($controller, $action); 
		}else{
			echo 'User not logged in';
		}
		?>
	</div>
</div>
</body>
</html>