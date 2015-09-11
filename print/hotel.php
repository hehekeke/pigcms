<?php
/**
 *  background access
 *
 */
 //root dir
define('ABS_PATH', dirname(__FILE__).'/');
include './config/config.inc.php';
include './'.MANAGE_DIR.'/base.php';
if (!isset($_GET['m'])){
	define('ROUTE_MODEL', 'site');
	define('ROUTE_CONTROL', 'home');
	define('ROUTE_ACTION', 'hotel');
}
if (!isset($_GET['token'])) {
	exit();
}

define('TOKEN', $_GET['token']);//把token值修改一下即可
bpBase::creatApp();
?>