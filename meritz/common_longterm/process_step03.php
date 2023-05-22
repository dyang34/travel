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

if(count($_POST['name']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(성명(한글))의 인원수가 일치하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['name_eng_last']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(성명(영문)의 성)의 인원수가 일치하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['name_eng_first']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(성명(영문)의 이름)의 인원수가 일치하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['jumin2']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(주민등록번호)의 인원수가 일치하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

if(count($_POST['is_dual']) != count($_SESSION['travel_step'][1]['member'])) {
	$json_code = array('result'=>'false','msg'=>'여행자 정보(영주권자/이중국적자)의 인원수가 일치하지 않습니다.');
	echo json_encode($json_code);
	exit;
}

for($i=0;$i<count($_POST['name']);$i++) {
	if(empty($_POST['name'][$i])) {

		if($i < 1) {
			$partner_name = "대표피보험자";
		} else {
			$partner_name = "동반인 ".$i;
		}

		$json_code = array('result'=>'false','msg'=>$partner_name.'의 성명(한글) 정보가 없습니다.');
		echo json_encode($json_code);
		exit;
	}
}

$arrMember = $_SESSION["travel_step"]["1"]["member"];
for($i=0;$i<count($_POST['jumin2']);$i++) {
	
	for($j=$i+1;$j<count($arrMember);$j++) {
		if($arrMember[$i]["birth"]==$arrMember[$j]["birth"] && $_POST['jumin2'][$i]==$_POST['jumin2'][$j]) {
			$json_code = array('result'=>'false','msg'=>substr($arrMember[$i]["birth"],2,6)."-".$_POST['jumin2'][$i].' 주민등록번호가 중복되어 있습니다.');
			echo json_encode($json_code);
			exit;
		}
	}

	if($i < 1) {
		$partner_name = "대표피보험자";
	} else {
		$partner_name = "동반인 ".$i;
	}

	if(empty($_POST['jumin2'][$i])) {
		$json_code = array('result'=>'false','msg'=>$partner_name.'의 주민등록번호 정보가 없습니다.');
		echo json_encode($json_code);
		exit;
	} else {

		$jumin2_first = (int)(substr($_POST['jumin2'][$i],0,1));

		if(((int)$arrMember[$i]["gender"])%2 != ($jumin2_first%2)) {
			$json_code = array('result'=>'false','msg'=>$partner_name.'의 성별과 주민등록번호 뒷자리의 성별이 상이합니다.');
			echo json_encode($json_code);
			exit;
		}

		if($jumin2_first < 5) {
			$jumin2_check = resnoCheck(substr($_SESSION["travel_step"]["1"]["member"][$i]['birth'],2,6),$_POST['jumin2'][$i]);
		} else if($jumin2_first < 9) {
			$jumin2_check = foreignerCheck(substr($_SESSION["travel_step"]["1"]["member"][$i]['birth'],2,6),$_POST['jumin2'][$i]);
		} else {
			$json_code = array('result'=>'false','msg'=>$partner_name.'의 주민등록번호를 확인해 주세요.');
			echo json_encode($json_code);
			exit;
		}

		if (!$jumin2_check) {
			$json_code = array('result'=>'false','msg'=>$partner_name.'의 주민등록번호를 확인해 주세요.');
			echo json_encode($json_code);
			exit;
		}
	}
}

for($i=0;$i<count($_POST['is_dual']);$i++) {
	if($_POST['is_dual'][$i]=="Y" && empty($_POST['nation_name'][$i])) {

		if($i < 1) {
			$partner_name = "대표피보험자";
		} else {
			$partner_name = "동반인 ".$i;
		}

		$json_code = array('result'=>'false','msg'=>$partner_name.'의 영주권(이중국적) 해당국 정보가 없습니다.');
		echo json_encode($json_code);
		exit;
	}
}

if (empty($hphone1)) {
	$json_code = array('result'=>'false','msg'=>'휴대폰 번호를 입력해 주세요.');
	echo json_encode($json_code);
	exit;
}

if (empty($hphone2)) {
	$json_code = array('result'=>'false','msg'=>'휴대폰 번호를 입력해 주세요.');
	echo json_encode($json_code);
	exit;
}

if (empty($hphone3)) {
	$json_code = array('result'=>'false','msg'=>'휴대폰 번호를 입력해 주세요.');
	echo json_encode($json_code);
	exit;
}

if (empty($email1)) {
	$json_code = array('result'=>'false','msg'=>'이메일을 입력해 주세요.');
	echo json_encode($json_code);
	exit;
}

if (empty($email2)) {
	$json_code = array('result'=>'false','msg'=>'이메일을 입력해 주세요.');
	echo json_encode($json_code);
	exit;
}

for($i=0;$i<count($_POST['name']);$i++) {
	$_SESSION["travel_step"]["1"]["member"][$i]['name'] = $_POST['name'][$i];
	$_SESSION["travel_step"]["1"]["member"][$i]['name_eng_last'] = $_POST['name_eng_last'][$i];
	$_SESSION["travel_step"]["1"]["member"][$i]['name_eng_first'] = $_POST['name_eng_first'][$i];
	$_SESSION["travel_step"]["1"]["member"][$i]['jumin2'] = $_POST['jumin2'][$i];
	$_SESSION["travel_step"]["1"]["member"][$i]['is_dual'] = $_POST['is_dual'][$i];
	$_SESSION["travel_step"]["1"]["member"][$i]['nation_name'] = $_POST['nation_name'][$i];

	if($i < 1) {
		$_SESSION["travel_step"]["1"]["member"][$i]['hphone1'] = $_POST['hphone1'];
		$_SESSION["travel_step"]["1"]["member"][$i]['hphone2'] = $_POST['hphone2'];
		$_SESSION["travel_step"]["1"]["member"][$i]['hphone3'] = $_POST['hphone3'];
		$_SESSION["travel_step"]["1"]["member"][$i]['email1'] = $_POST['email1'];
		$_SESSION["travel_step"]["1"]["member"][$i]['email2'] = $_POST['email2'];
			
	}
}
$json_code = array('result'=>'true','msg'=>'success');
echo json_encode($json_code);
exit;
?>