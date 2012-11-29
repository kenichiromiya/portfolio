<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

function __autoload($class_name) {
	if (preg_match_all("/(.+)Controller/",$class_name,$m)) {
		$file_name = "../app/controllers/".strtolower($m[1][0]).".php";
	} elseif (preg_match_all("/(.+)Model/",$class_name,$m)) {
		$file_name = "../app/models/".strtolower($m[1][0]).".php";
	} else {
		$file_name = strtolower($class_name).".php";
	}
	include $file_name;
}

if ($_POST['_method']) {
	$_SERVER["REQUEST_METHOD"] = strtoupper($_POST['_method']);
	unset($_POST['_method']);
}
/*
foreach ($_GET as $key => $value) {
	if(preg_match("/id$/",$key)) {
		$_POST[$key] = $value;
	}
}
*/
include_once("../app/define.php");
include_once("mypdo.php");
include_once("db.php");
//include_once("lang.php");
//include_once("helper.php");
include_once("functions.php");
include_once("gettext.php");
//include_once("router.php");
//$sanitizer = New Sanitizer();
//$param = $sanitizer->sanitize();
$dispatcher = New Dispatcher();
$dispatcher->dispatch();
?>
