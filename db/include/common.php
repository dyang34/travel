<?php
@ session_start();

header("Content-Type:text/html; charset=UTF-8");
extract($_POST);
extract($_GET);
extract($_SERVER);
extract($_FILES);
extract($_ENV);
extract($_COOKIE);
extract($_SESSION);

/*
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
*/
ini_set("display_errors","0");

require_once $_SERVER['DOCUMENT_ROOT']."/include/common_siteinfo.php";
/*
if (_TOURSAFE_SUBSITE_SERVICE != '1') {
	header("Location: https://".$_SERVER['HTTP_HOST']."/travel/db/main/main2.php");
}
*/
//$SYS_ROOT_DIR=str_replace(_TOURSAFE_SUBSITE_DIR,"",$_SERVER['DOCUMENT_ROOT']);
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
$member_no=_TOURSAFE_MEMBER_NO;
//$site_config_company_type="2";

include_once $SYS_ROOT_DIR."/include/dbconn_ulife.php";
include_once $SYS_ROOT_DIR."/include/dbconn.php";
include_once $SYS_ROOT_DIR."/include/option_config.php";
include_once $SYS_ROOT_DIR."/lib/function.php";
include_once $SYS_ROOT_DIR."/lib/function_xss.php";
include_once $SYS_ROOT_DIR."/lib/function_thumbnail.php";
include_once $SYS_ROOT_DIR."/config/site_config.php";

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS']=="") {
	$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location: $redirect");
}
?>