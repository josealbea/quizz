<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('SITE_NAME', 'Open ESGI Quizz');

// Database access
define('DB', 'mysql:dbname=facebook;host=localhost;charset=utf8');
define('USER', 'root');
define('PASSWORD', 'root');

// Facebook configuration
define('APPID', '194744407377894');
define('APPSECRET', '18559abeb6be6a8c8a26a60bd645d1fb');
define('PAGEID', '535494466533197');
define('MAX_QUESTIONS', 10);
define('QUESTION_PER_LEVEL', 5);
// TEST GITIGNORE