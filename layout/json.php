<?php
$config = array();
$config['appId'] = APPID;
$config['secret'] = APPSECRET;

$facebook = new Facebook($config);
$fbUser   = $facebook->api('/me');

header('Content-Type: application/json');