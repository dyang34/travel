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

if ($_POST['check_type1'] == "Y") {
	$json_code = array('result'=>'false','msg'=>'여행 출발전 고지 사항 1번 항목이 "예"일 경우 가입할 수 없습니다.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['check_type2'] == "Y") {
	$json_code = array('result'=>'false','msg'=>'여행 출발전 고지 사항 2번 항목이 "예"일 경우 가입할 수 없습니다.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['check_type3'] == "Y") {
	$json_code = array('result'=>'false','msg'=>'여행 출발전 고지 사항 3번 항목이 "예"일 경우 가입할 수 없습니다.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['check_type4'] == "Y") {
	$json_code = array('result'=>'false','msg'=>'여행 출발전 고지 사항 4번 항목이 "예"일 경우 가입할 수 없습니다.');
	echo json_encode($json_code);
	exit;
}

if ($_SESSION["travel_step"]["1"]["trip_type"]=="1" && $_POST['check_type5'] == "Y") {
	$json_code = array('result'=>'false','msg'=>'여행 출발전 고지 사항 5번 항목이 "예"일 경우 가입할 수 없습니다.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk1'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[이용약관]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['select_agree'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[개인정보수집 및 이용 동의]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk3_1'] != "Y" && $_POST['chk3_2'] != "Y" && $_POST['chk3_3'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[개인정보 처리 및 단체가입규약 동의]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk3_1'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[단체가입규약 동의]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk3_2'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[개인정보 수집 및 이용 및 제3자 제공 동의]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk3_3'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[고유식별 정보 수집 및 이용제공 및 제3자 제공 동의]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

if ($_POST['chk4'] != "Y") {
	$json_code = array('result'=>'false','msg'=>'[보험약관]에 동의해 주세요.');
	echo json_encode($json_code);
	exit;
}

$_SESSION["travel_step"]["4"]["check_type1"] = $_POST['check_type1'];
$_SESSION["travel_step"]["4"]["check_type2"] = $_POST['check_type2'];
$_SESSION["travel_step"]["4"]["check_type3"] = $_POST['check_type3'];
$_SESSION["travel_step"]["4"]["check_type4"] = $_POST['check_type4'];
$_SESSION["travel_step"]["4"]["check_type5"] = $_POST['check_type5'];
$_SESSION["travel_step"]["4"]["chk1"] = $_POST['chk1'];
$_SESSION["travel_step"]["4"]["select_agree"] = $_POST['select_agree'];
$_SESSION["travel_step"]["4"]["chk3"] = $_POST['chk3'];
$_SESSION["travel_step"]["4"]["chk3_1"] = $_POST['chk3_1'];
$_SESSION["travel_step"]["4"]["chk3_2"] = $_POST['chk3_2'];
$_SESSION["travel_step"]["4"]["chk3_3"] = $_POST['chk3_3'];
$_SESSION["travel_step"]["4"]["check_type_marketing"] = $_POST['check_type_marketing'];
$_SESSION["travel_step"]["4"]["chk4"] = $_POST['chk4'];

$tripType = $_SESSION["travel_step"]["1"]["trip_type"];
$term_day = $_SESSION["travel_step"]["2"]["term_day"];
$plan_type = $_SESSION["travel_step"]["2"]["plan_type"];
$nation = $_SESSION["travel_step"]["1"]["nation"];
$send_type = "1";

$session_key = date("Ymd")."|".$tripType."|".$nation."|".$term_day."|".$_SESSION["travel_step"]["2"]["sum_price"].$plan_type."|".time();

$sql_tmp="insert into hana_plan_tmp set
			session_key='".$session_key."',
			member_no='".$member_no."',
			trip_type='".$tripType."',
			order_type='".$send_type."',
			nation_no='".$nation."',
			trip_purpose='".$_SESSION["travel_step"]["1"]["trip_purpose"]."',
			start_date='".$_SESSION["travel_step"]["1"]["start_date"]."',
			start_hour='".$_SESSION["travel_step"]["1"]["start_hour"]."',
			end_date='".$_SESSION["travel_step"]["1"]["end_date"]."',
			end_hour='".$_SESSION["travel_step"]["1"]["end_hour"]."',

			check_type_1='".$_SESSION["travel_step"]["4"]["check_type1"]."',
			check_type_2='".$_SESSION["travel_step"]["4"]["check_type2"]."',
			check_type_3='".$_SESSION["travel_step"]["4"]["check_type3"]."',
			check_type_4='".$_SESSION["travel_step"]["4"]["check_type4"]."',
			check_type_5='".$_SESSION["travel_step"]["4"]["check_type5"]."',
			select_agree='".$_SESSION["travel_step"]["4"]["select_agree"]."',
			check_type_marketing='".$_SESSION["travel_step"]["4"]["check_type_marketing"]."',

			term_day='".$term_day."',
			join_cnt='".count($_SESSION["travel_step"]["1"]["member"])."',
			plan_type='".$plan_type."',
			referer_type='1',
			company_type = 2,
			regdate='".time()."'
";	

mysql_query($sql_tmp, $conn);
$tmp_no = mysql_insert_id();

$_SESSION["travel_step"]["4"]["tmp_no"] = $tmp_no;
$_SESSION["travel_step"]["4"]["session_key"] = $session_key;

$arrMember = $_SESSION["travel_step"]["1"]["member"];
for($i=0;$i<count($arrMember);$i++) {

	$sql_price="select a.plan_code, price, b.plan_title, b.plan_title_src from plan_code_price_hana a 
				left join plan_code_hana b 
				on a.plan_code = b.plan_code and a.company_type = b.company_type and a.member_no = b.member_no and a.trip_type = b.trip_type 
				where a.company_type=2 and a.member_no='".$site_config_member_no."' and a.trip_type='".$tripType."' 
				and a.plan_type like '%".$plan_type."%' and b.cal_type = '".$arrMember[$i]["cal_type"]."' and sex = '".$arrMember[$i]["gender"]."' 
				and age = '".$arrMember[$i]["cal_age"]."' and term_day >= '".$term_day."' order by term_day asc limit 1";

	$rs_plan_price=mysql_query($sql_price, $conn);
	//$row_plan_price = $rs_plan_price->fetch_assoc();

	$row_plan_price=mysql_fetch_assoc($rs_plan_price);

	$_SESSION["travel_step"]["1"]["member"][$i]["price"] = $row_plan_price["price"];
	$_SESSION["travel_step"]["1"]["member"][$i]["plan_code"] = $row_plan_price["plan_code"];
	$_SESSION["travel_step"]["1"]["member"][$i]["plan_title"] = $row_plan_price["plan_title"];
	$_SESSION["travel_step"]["1"]["member"][$i]["plan_title_src"] = $row_plan_price["plan_title_src"];

	$jumin1_encode = encode_pass(addslashes(fnFilterString(substr($arrMember[$i]['birth'],2,6))),$pass_key);
	$jumin2_encode = encode_pass(addslashes(fnFilterString($arrMember[$i]['jumin2'])),$pass_key);

	if ($i < 1) {
		$hphone_encode = encode_pass(addslashes(fnFilterString($arrMember[$i]['hphone1'])).addslashes(fnFilterString($arrMember[$i]['hphone2'])).addslashes(fnFilterString($arrMember[$i]['hphone3'])),$pass_key);
		$email_encode = encode_pass(addslashes(fnFilterString($arrMember[$i]['email1']))."@".addslashes(fnFilterString($arrMember[$i]['email2'])),$pass_key);
	} else {
		$hphone_encode = "";
		$email_encode = "";
	}

	$sql_tmp="insert into hana_plan_member_tmp set
		tmp_no='".$tmp_no."',
		main_check='".(($i < 1)?"Y":"N")."',
		name='".addslashes(fnFilterString($arrMember[$i]['name']))."',
		name_eng='".$arrMember[$i]['name_eng_last']." ".$arrMember[$i]['name_eng_first']."',
		name_eng_first='".$arrMember[$i]['name_eng_first']."',
		name_eng_last='".$arrMember[$i]['name_eng_last']."',
		jumin_1='".$jumin1_encode."',
		jumin_2='".$jumin2_encode."',
		hphone='".$hphone_encode."',
		email='".$email_encode."',
		plan_code='".$row_plan_price['plan_code']."',
		plan_price='".$row_plan_price["price"]."',
		sex='".$arrMember[$i]['gender']."',
		age='".$arrMember[$i]['cal_age']."',
		plan_title = '".$row_plan_price["plan_title"]."',
		plan_title_src = '".$row_plan_price["plan_title_src"]."',
		fg_dual = '".($arrMember[$i]['is_dual']=="Y"?"1":"0")."',
		nation_name = '".($arrMember[$i]['is_dual']=="Y"?$arrMember[$i]['nation_name']:"")."'
	";

	mysql_query($sql_tmp);
}

$json_code = array('result'=>'true','msg'=>'success');
echo json_encode($json_code);
exit;
?>