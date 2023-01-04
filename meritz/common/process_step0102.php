<?
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/meritz/include/common.php";
require_once $SYS_ROOT_DIR."/travel/meritz/config/get_site_config_member_no.php";

if (!chkToken($_REQUEST['auth_token'])) {
	$json_code = array('result'=>'false','msg'=>'잘못된 접속 입니다.');
	echo json_encode($json_code);
	exit;
}

if(empty($_SESSION["travel_step"])) {
	$json_code = array('result'=>'false','msg'=>'이전 가입하던 정보가 존재하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['birth']) < 1) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(생년월일)가 없습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['gender']) < 1) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(성별)가 없습니다.');
	echo json_encode($json_code);
	exit;
}

$tripType = $_SESSION["travel_step"]["1"]["trip_type"];

if($tripType=="2") {
	$start_date = $_SESSION["travel_step"]["1"]["start_date"];
	$start_hour = $_SESSION["travel_step"]["1"]["start_hour"];
	$end_date = $_SESSION["travel_step"]["1"]["end_date"];
	$end_hour = $_SESSION["travel_step"]["1"]["end_hour"];

	$start_date_arr=explode("-",$start_date);
	$start_time=mktime($start_hour,"00","00",$start_date_arr[1],$start_date_arr[2],$start_date_arr[0]);

	$end_date_arr=explode("-",$end_date);
	$end_time=mktime($end_hour,"00","00",$end_date_arr[1],$end_date_arr[2],$end_date_arr[0]);

	// 해외 80세 이상 체크용.
	$rl_term_day = real_period($start_date." ".$start_hour.":00:00", $end_date." ".$end_hour.":00:00");
	$cur_date=date("Y-m-d");
}

for($i=0;$i<count($_POST['birth']);$i++) {
	if(empty($_POST['gender'][$i])) {

		if($i < 1) {
			$partner_name = "본인";
		} else {
			$partner_name = "동반인 ".$i;
		}

		$json_code = array('result'=>'false','msg'=>$partner_name.'의 성별 정보가 없습니다.');
		echo json_encode($json_code);
		exit;
	}
	
	if($tripType=="2") {
		$birth_date=substr($_POST['birth'][$i],0,4)."-".substr($_POST['birth'][$i],4,2)."-".substr($_POST['birth'][$i],6,2);
			
		list($cal_age,$term_year) = age_cal($start_date,$birth_date);	// cal_age 보험나이, term_year 만나이.

		if ($cal_age >= 80 && $rl_term_day > 30) {
			$json_code = array('result'=>'false','msg'=>'여행자보험 가입시 80세 이상 고객님은 최대 30일까지만 가입이 가능합니다. 31일 이상 가입은 고객센터로 연락주세요. (1800-9010)');
			echo json_encode($json_code);
			exit;
		}
	}
}

$_SESSION["travel_step"]["1"]["member"] = array();
for($i=0;$i<count($_POST['birth']);$i++) {
	if(!empty($_POST['birth'][$i])) {
		array_push($_SESSION["travel_step"]["1"]["member"], array('birth'=>$_POST['birth'][$i], 'gender'=>$_POST['gender'][$i]));
	}
}
/*
if(count($_POST['birth']) > 1) {
	$_SESSION["travel_step"]["1"]["trip_group_type"] = 2;
} else {
	$_SESSION["travel_step"]["1"]["trip_group_type"] = 1;
}
*/
unset($_SESSION["travel_step"]["2"]);

$json_code = array('result'=>'true','msg'=>'success');
echo json_encode($json_code);
exit;
?>