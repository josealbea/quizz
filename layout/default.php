<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo WEBROOT; ?>skin/css/style.css" />
	<script src="<?php echo WEBROOT; ?>skin/js/jquery-1.10.2.min.js"></script>
</head>
<body>
	<!-- Facebook loading -->
	<div id="fb-root"></div>
	<script>
	window.fbAsyncInit = function() {
		// init the FB JS SDK
		FB.init({
		appId      : '<?php echo APPID; ?>',                    	    		// App ID from the app dashboard
		channelUrl : '<?php echo WEBROOT; ?>core/channel.php', 					// Channel file for x-domain comms
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
		}else if (response.status === 'not_authorized') {
			window.location.reload();
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
		js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=" + <?php echo APPID; ?>;
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
		$fbUser   = $facebook->api('/me');
