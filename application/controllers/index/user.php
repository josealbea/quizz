<?php
/*
 * DATABASE INSERTION OR UPDATE OF THE USER
 */
global $facebook;

$user  = $facebook->api('/me');
User::insertUser($user);

/*
 * END OF INSERTION IN DATABASE OF THE USER
 */
?>