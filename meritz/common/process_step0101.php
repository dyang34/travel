<?
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/meritz/include/common.php";
require_once $SYS_ROOT_DIR."/travel/meritz/config/get_site_config_member_no.php";

if (!chkToken($_REQUEST['auth_token'])) {
	$json_code = array('result'=>'false','msg'=>'잘못된 접속 입니다.');
	echo json_encode($json_code);
	exit;
}

$trip_type = addslashes(fnFilterString($_POST['trip_type']));
$trip_purpose = addslashes(fnFilterString($_POST['trip_purpose']));
// $trip_group_type = addslashes(fnFilterString($_POST['trip_group_type']));
$nation_search = addslashes(fnFilterString($_POST['nation_search']));
$nation = addslashes(fnFilterString($_POST['nation']));

$start_date = addslashes(fnFilterString($_POST['start_date']));
$start_hour = addslashes(fnFilterString($_POST['start_hour']));

$end_date = addslashes(fnFilterString($_POST['end_date']));
$end_hour = addslashes(fnFilterString($_POST['end_hour']));

if ($trip_type=="") {
	$json_code = array('result'=>'false','msg'=>'여행종류를 선택하세요.');
	echo json_encode($json_code);
	exit;
}

if ($trip_purpose=="") {
	$json_code = array('result'=>'false','msg'=>'여행목적을 선택하세요.');
	echo json_encode($json_code);
	exit;
}
/*
if ($trip_group_type=="") {
	$json_code = array('result'=>'false','msg'=>'가입유형을 선택하세요.');
	echo json_encode($json_code);
	exit;
}
*/
if ($nation_search=="") {
	$json_code = array('result'=>'false','msg'=>'여행국가를 입력하세요.');
	echo json_encode($json_code);
	exit;
}

if ($nation=="") {
	$json_code = array('result'=>'false','msg'=>'여행국가를 선택해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($start_date=="") {
	$json_code = array('result'=>'false','msg'=>'여행 출발일을 입력하세요.');
	echo json_encode($json_code);
	exit;
}

if ($end_date=="") {
	$json_code = array('result'=>'false','msg'=>'여행 도착일을 입력하세요.');
	echo json_encode($json_code);
	exit;
}

$_SESSION["travel_step"]["1"]["trip_type"] = $trip_type;
$_SESSION["travel_step"]["1"]["trip_purpose"] = $trip_purpose;
//$_SESSION["travel_step"]["1"]["trip_group_type"] = $trip_group_type;
$_SESSION["travel_step"]["1"]["nation_search"] = $nation_search;
$_SESSION["travel_step"]["1"]["nation"] = $nation;
$_SESSION["travel_step"]["1"]["start_date"] = $start_date;
$_SESSION["travel_step"]["1"]["start_hour"] = $start_hour;
$_SESSION["travel_step"]["1"]["end_date"] = $end_date;
$_SESSION["travel_step"]["1"]["end_hour"] = $end_hour;

unset($_SESSION["travel_step"]["2"]);
unset($_SESSION["travel_step"]["4"]);

$json_code = array('result'=>'true','msg'=>'success');
echo json_encode($json_code);
exit;
?>