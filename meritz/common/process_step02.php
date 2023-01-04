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

if (empty($plan_type)) {
	$json_code = array('result'=>'false','msg'=>'플랜을 선택하세요.');
	echo json_encode($json_code);
	exit;
}

if (empty($plan_title)) {
	$json_code = array('result'=>'false','msg'=>'플랜을 선택하세요.');
	echo json_encode($json_code);
	exit;
}

if ($sum_price < 1) {
	$json_code = array('result'=>'false','msg'=>'플랜금액 에러입니다.');
	echo json_encode($json_code);
	exit;
}

if (empty($term_day)) {
	$json_code = array('result'=>'false','msg'=>'기간 오류가 발생하였습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['cal_age']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보의 보험나이 계산 오류가 발생하였습니다.');
	echo json_encode($json_code);
	exit;
}

$_SESSION["travel_step"]["2"]["plan_type"] = $plan_type;
$_SESSION["travel_step"]["2"]["sum_price"] = $sum_price;
$_SESSION["travel_step"]["2"]["plan_title"] = $plan_title;
$_SESSION["travel_step"]["2"]["term_day"] = $term_day;

for($i=0;$i<count($_POST['cal_age']);$i++) {
	if(empty($_POST['cal_age'][$i])) {
		$json_code = array('result'=>'false','msg'=>"여행자 정보의 보험나이 오류가 발생하였습니다.");
		echo json_encode($json_code);
		exit;
	} else {
		$_SESSION["travel_step"]["1"]["member"][$i]['cal_age'] = $_POST['cal_age'][$i];
	}
}

$json_code = array('result'=>'true','msg'=>'success');
echo json_encode($json_code);
exit;
?>