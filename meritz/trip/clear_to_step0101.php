<?
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/meritz/include/common.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";

unset($_SESSION["travel_step"]);
//$_SESSION["travel_step"] = array();

JsUtil::replace("step0101.php");
?>