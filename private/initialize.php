<?php

ini_set('memory_limit', '-1');

$site_name = $_SERVER['SERVER_NAME'];

define("SITE_NAME", $_SERVER['SERVER_NAME'] );

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBIC_PATH", PROJECT_PATH . '/public');
define("CLASS_PATH", PRIVATE_PATH . '/class');
define("SERVICE_PATH", PRIVATE_PATH . '/service');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once(CLASS_PATH.'/class.order.php');

require_once(PRIVATE_PATH.'/functions.php');

?>