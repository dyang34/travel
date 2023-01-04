<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";

$pageStepNo = 5;

$fg_bill_try =false;
if(!empty($_POST[ "param_opt_1"     ])) {
	$fg_bill_try = true;
}

if(chk_step_session($pageStepNo)) {
	if ($fg_bill_try) {

		$arrParam2 = explode('|',$_POST[ "param_opt_2"]);

		$sql="select * from hana_plan_tmp where no = '".$_POST[ "param_opt_1"]."' ";
		$result=mysql_query($sql, $conn);
		$row=mysql_fetch_array($result);
		
		$_SESSION["travel_step"]["1"]["trip_type"] = $row["trip_type"];
		$_SESSION["travel_step"]["1"]["trip_purpose"] = $row["trip_purpose"];
		$_SESSION["travel_step"]["1"]["nation_search"] = $arrParam2[0];
		$_SESSION["travel_step"]["1"]["nation"] = $row["nation_no"];
		$_SESSION["travel_step"]["1"]["start_date"] = $row["start_date"];
		$_SESSION["travel_step"]["1"]["start_hour"] = $row["start_hour"];
		$_SESSION["travel_step"]["1"]["end_date"] = $row["end_date"];
		$_SESSION["travel_step"]["1"]["end_hour"] = $row["end_hour"];

		$_SESSION["travel_step"]["2"]["plan_type"] = $row["plan_type"];
		$_SESSION["travel_step"]["2"]["plan_title"] = $arrParam2[1];
		$_SESSION["travel_step"]["2"]["term_day"] = $row["term_day"];

		$_SESSION["travel_step"]["4"]["check_type1"] = $row['check_type_1'];
		$_SESSION["travel_step"]["4"]["check_type2"] = $row['check_type_2'];
		$_SESSION["travel_step"]["4"]["check_type3"] = $row['check_type_3'];
		$_SESSION["travel_step"]["4"]["check_type4"] = $row['check_type_4'];
		$_SESSION["travel_step"]["4"]["check_type5"] = $row['check_type_5'];
		$_SESSION["travel_step"]["4"]["select_agree"] = $row['select_agree'];
		$_SESSION["travel_step"]["4"]["check_type_marketing"] = $row['check_type_marketing'];
		$_SESSION["travel_step"]["4"]["chk1"] = "Y";
		$_SESSION["travel_step"]["4"]["chk3"] = "Y";
		$_SESSION["travel_step"]["4"]["chk3_1"] = "Y";
		$_SESSION["travel_step"]["4"]["chk3_2"] = "Y";
		$_SESSION["travel_step"]["4"]["chk3_3"] = "Y";
		$_SESSION["travel_step"]["4"]["chk4"] = "Y";
		$_SESSION["travel_step"]["4"]["tmp_no"] = $_POST[ "param_opt_1"     ];
		$_SESSION["travel_step"]["4"]["session_key"] = $_POST[ "param_opt_3"     ];

		$sum_price = 0;
		$_SESSION["travel_step"]["1"]["member"] = array();
		$sql="select * from hana_plan_member_tmp where tmp_no = '".$_POST[ "param_opt_1"]."' order by no";
		$result=mysql_query($sql, $conn);
		while($row=mysql_fetch_array($result)) {
		
			$jumin1_decode = trim(decode_pass($row['jumin_1'],$pass_key));
			$jumin2_decode = trim(decode_pass($row['jumin_2'],$pass_key));

			$hphone1 = "";
			$hphone2 = "";
			$hphone3 = "";
			$email1 = "";
			$email2 = "";
			if (!empty($row["hphone"])) {
				$hphone_decode = trim(decode_pass($row['hphone'],$pass_key));

				if (mb_strlen($hphone_decode) > 10) {
					$hphone2_size = 4;	// 휴대폰 중간번호가 4자리.
				} else {
					$hphone2_size = 3;	// 휴대폰 중간번호가 3자리.
				}

				$hphone1 = substr($hphone_decode,0,3); 
				$hphone2 = substr($hphone_decode,3,$hphone2_size); 
				$hphone3 = substr($hphone_decode,(3+$hphone2_size),4); 
			}

			if (!empty($row["email"])) {
				$email_decode = trim(decode_pass($row['email'],$pass_key));

				$email_idx = strpos($email_decode, "@");
				$email1 = substr($email_decode,0,$email_idx);
				$email2 = substr($email_decode,$email_idx+1,mb_strlen($email_decode)-1);
			}

			if(substr($jumin2_decode,0,1) == '1' || substr($jumin2_decode,0,1) == '2' || substr($jumin2_decode,0,1) == '5' || substr($jumin2_decode,0,1) == '6') {
				$birth = "19".$jumin1_decode;
			} else {
				$birth = "20".$jumin1_decode;
			}

			$name_eng_idx = strrpos($row['name_eng'], " ");

			array_push($_SESSION["travel_step"]["1"]["member"], array(
					 'birth'=>$birth
					, 'gender'=>$row['sex']
					, 'cal_age'=>$row['age']
					, 'name'=>$row['name']
					, 'name_eng_last'=>substr($row['name_eng'], $name_eng_idx+1, mb_strlen($row['name_eng'])-1)
					, 'name_eng_first'=>substr($row['name_eng'], 0, $name_eng_idx)
					, 'jumin2'=>$jumin2_decode
					, 'is_dual'=>($row['fg_dual']=="1"?"Y":"N")
					, 'nation_name'=>$row['nation_name']
					, 'hphone1'=>$hphone1
					, 'hphone2'=>$hphone2
					, 'hphone3'=>$hphone3
					, 'email1'=>$email1
					, 'email2'=>$email2
					, 'price'=>$row['plan_price']
					, 'plan_code'=>$row['plan_code']
					, 'plan_title'=>$row['plan_title']
					, 'plan_title_src'=>$row['plan_title_src']
				)
			);

			$sum_price += $row["plan_price"];
		}

		$_SESSION["travel_step"]["2"]["sum_price"] = $sum_price;

	} else {
		JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/meritz/m/trip/step0101.php");
//		JsUtil::replace("/travel/meritz/m/trip/clear_to_step0101.php");
		exit;
	}
}

$o_num = time()."_".rand(10000,99999);
$tripType = $_SESSION["travel_step"]["1"]["trip_type"];

require_once $SYS_ROOT_DIR."/travel/meritz/bill_kcp/cfg/site_conf_inc.php";

/* kcp와 통신후 kcp 서버에서 전송되는 결제 요청 정보 */
$req_tx          = $_POST[ "req_tx"         ]; // 요청 종류         
$res_cd          = $_POST[ "res_cd"         ]; // 응답 코드         
$tran_cd         = $_POST[ "tran_cd"        ]; // 트랜잭션 코드     
$ordr_idxx       = $_POST[ "ordr_idxx"      ]; // 쇼핑몰 주문번호   
$good_name       = $_POST[ "good_name"      ]; // 상품명            
$good_mny        = $_POST[ "good_mny"       ]; // 결제 총금액       
$buyr_name       = $_POST[ "buyr_name"      ]; // 주문자명          
$buyr_tel1       = $_POST[ "buyr_tel1"      ]; // 주문자 전화번호   
$buyr_tel2       = $_POST[ "buyr_tel2"      ]; // 주문자 핸드폰 번호
$buyr_mail       = $_POST[ "buyr_mail"      ]; // 주문자 E-mail 주소
$use_pay_method  = $_POST[ "use_pay_method" ]; // 결제 방법         
$enc_info        = $_POST[ "enc_info"       ]; // 암호화 정보       
$enc_data        = $_POST[ "enc_data"       ]; // 암호화 데이터     
$cash_yn         = $_POST[ "cash_yn"        ];
$cash_tr_code    = $_POST[ "cash_tr_code"   ];
/* 기타 파라메터 추가 부분 - Start - */
$param_opt_1    = $_POST[ "param_opt_1"     ]; // 기타 파라메터 추가 부분
$param_opt_2    = $_POST[ "param_opt_2"     ]; // 기타 파라메터 추가 부분
$param_opt_3    = $_POST[ "param_opt_3"     ]; // 기타 파라메터 추가 부분
/* 기타 파라메터 추가 부분 - End -   */

$tablet_size     = "1.0"; // 화면 사이즈 고정
$url = $site_ssl."://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<script type="text/javascript" src="../../js/approval_key.js"></script>
<script type="text/javascript">
	function call_pay_form() {
		var v_frm = document.order_info;
		
		if(v_frm.encoding_trans == undefined) {
			v_frm.action = PayUrl;
		} else {
			if(v_frm.encoding_trans.value == "UTF-8") {
				v_frm.action = PayUrl.substring(0,PayUrl.lastIndexOf("/")) + "/jsp/encodingFilter/encodingFilter.jsp";
				v_frm.PayUrl.value = PayUrl;
			} else {
				v_frm.action = PayUrl;
			}
		}

		if (v_frm.Ret_URL.value == "") {
			alert("연동시 Ret_URL을 반드시 설정하셔야 됩니다.");
			return false;
		} else {
			v_frm.submit();
		}
	}

	function chk_pay() {
		self.name = "tar_opener";
		var pay_form = document.pay_form;

		if (pay_form.res_cd.value == "3001" ) {
			alert("사용자가 취소하였습니다.");
			pay_form.res_cd.value = "";
		}

//		alert("here"+pay_form.ordr_idxx.value);
		if (pay_form.enc_info.value)
			pay_form.submit();
	}
</script>
<script>
	$(document).ready(function() {
		chk_pay();
	});
</script>
<div class="trip-wrap">
	<h2>여행자보험 가입</h2>

	<!-- /** 제목영역 -->
	<div class="title-wrap clearfix">
		<h3>5. 보험료 결제</h3>
		<div class="btn-right">
			<a id="btn-mod" class="button small red-line">정보수정</a>
		</div>
	</div>
	<!-- 제목영역 */ -->

<form name="order_info" method="post">
<input type="hidden" name="encoding_trans" value="UTF-8" readonly>
<input type="hidden" name="PayUrl"> 
<input type="hidden" id="pay_method" name="pay_method" value="CARD" readonly>
<input type="hidden" name="ordr_idxx" value="<?=$o_num?>" maxlength="40"/>
<input type="hidden" name="good_name" value="유다이렉트(메리츠) 여행자보험"/>
<input type="hidden" name="good_mny" value="<?=$_SESSION["travel_step"]["2"]["sum_price"]?>" maxlength="9"/>
<input type="hidden" name="buyr_name" value="<?=stripslashes($_SESSION["travel_step"]["1"]["member"][0]["name"])?>"/>
<input type="hidden" name="buyr_mail" value="" maxlength="30">
<input type="hidden" name="buyr_tel1" value="<?=$_SESSION["travel_step"]["1"]["member"][0]["hphone1"].$_SESSION["travel_step"]["1"]["member"][0]["hphone2"].$_SESSION["travel_step"]["1"]["member"][0]["hphone3"]?>">
<input type="hidden" name="buyr_tel2" value=""/>

<input type="hidden" name="req_tx"          value="pay">                           <!-- 요청 구분 -->
<input type="hidden" name="shop_name"       value="<?= $g_conf_site_name ?>">      <!-- 사이트 이름 --> 
<input type="hidden" name="site_cd"         value="<?= $g_conf_site_cd   ?>">      <!-- 사이트 코드 -->
<input type="hidden" name="currency"        value="410"/>                          <!-- 통화 코드 -->
<input type="hidden" name="eng_flag"        value="N"/>                            <!-- 한 / 영 -->
<!-- 결제등록 키 -->
<input type="hidden" name="approval_key"    id="approval">
<!-- 인증시 필요한 파라미터(변경불가)-->
<input type="hidden" name="escw_used"       value="N">
<input type="hidden" name="van_code"        value="">
<!-- 신용카드 설정 -->
<input type="hidden" name="quotaopt"        value="12"/>                           <!-- 최대 할부개월수 -->
<!-- 가상계좌 설정 -->
<input type="hidden" name="ipgm_date"       value=""/>
<!-- 가맹점에서 관리하는 고객 아이디 설정을 해야 합니다.(필수 설정) -->
<input type="hidden" name="shop_user_id"    value=""/>
<!-- 복지포인트 결제시 가맹점에 할당되어진 코드 값을 입력해야합니다.(필수 설정) -->
<input type="hidden" name="pt_memcorp_cd"   value=""/>
<!-- 현금영수증 설정 -->
<input type="hidden" name="disp_tax_yn"     value="Y"/>
<!-- 리턴 URL (kcp와 통신후 결제를 요청할 수 있는 암호화 데이터를 전송 받을 가맹점의 주문페이지 URL) -->
<input type="hidden" name="Ret_URL"         value="<?=$url?>">
<!-- 화면 크기조정 -->
<input type="hidden" name="tablet_size"     value="<?=$tablet_size?>">

<!-- 추가 파라미터 ( 가맹점에서 별도의 값전달시 param_opt 를 사용하여 값 전달 ) -->
<input type="hidden" name="param_opt_1"     value="<?=$_SESSION['travel_step'][4]["tmp_no"]?>">
<input type="hidden" name="param_opt_2"     value="<?=$_SESSION['travel_step'][1]["nation_search"]."|".$_SESSION['travel_step'][2]["plan_title"]?>">
<input type="hidden" name="param_opt_3"     value="<?=$_SESSION['travel_step'][4]["session_key"]?>">
<?
$billing_card_val = $billing_card_company_common;
if (defined('_TOURSAFE_SUBSITE_BILLING_CARD')) {
	if (_TOURSAFE_SUBSITE_BILLING_CARD=="TYPE_1") {
		$billing_card_val = $billing_card_company;
	}
}
?>
<input type="hidden" name="used_card" value="<?=$billing_card_val?>"/>

		<div class="signUp-wrap">
			<h3 class="title">여행자보험 가입신청정보</h3>

			<div class="step05">
				<table class="table-deepGray">
					<colgroup>
						<col width="35%">
						<col width="*">
					</colgroup>
					<tbody>
						<tr>
							<th class="type01">상품명</th>
							<td><?=$_SESSION["travel_step"]["1"]["trip_type"]=="1"?"국내":"해외"?>여행실손의료보험 - <?=$_SESSION["travel_step"]["2"]["plan_title"]?></td>
						</tr>
						<tr>
							<th class="type01">피보험자/계약자</th>
							<td><?=$_SESSION["travel_step"]["1"]["member"][0]["name"].(($_SESSION["travel_step"]["1"]["member"][0]["name_eng_last"] || $_SESSION["travel_step"]["1"]["member"][0]["name_eng_first"])?" / ".$_SESSION["travel_step"]["1"]["member"][0]["name_eng_last"]." ".$_SESSION["travel_step"]["1"]["member"][0]["name_eng_first"]:"")?></td>
						</tr>
						<tr>
							<th class="type01">출발 일시</th>
							<td><?=$_SESSION["travel_step"]["1"]["start_date"]." ".$_SESSION["travel_step"]["1"]["start_hour"]?>시</td>
						</tr>
						<tr>
							<th class="type01">도착 일시</th>
							<td><?=$_SESSION["travel_step"]["1"]["end_date"]." ".$_SESSION["travel_step"]["1"]["end_hour"]?>시</td>
						</tr>
						<tr>
							<th class="type01">여행목적<br/>(지역)</th>
							<td><?=$trip_purpose_array[$_SESSION["travel_step"]["1"]["trip_purpose"]]."<br/>(".$_SESSION["travel_step"]["1"]["nation_search"].")"?></td>
						</tr>
						<tr>
							<th class="type01">인원 (<?=count($_SESSION["travel_step"]["1"]["member"])?>명)</th>
							<td>
<?php
	for($i=0;$i<count($_SESSION["travel_step"]["1"]["member"]);$i++) {
?>		
		<?=$_SESSION["travel_step"]["1"]["member"][$i]["name"]?>&nbsp;￦<?=number_format($_SESSION["travel_step"]["1"]["member"][$i]["price"])?>원
<?php		
		if($i < (count($_SESSION["travel_step"]["1"]["member"])-1)) {
			echo "<br/>";
		}
	}
?>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-wrap">
					<strong>총 금액(일시납)</strong>
					<p><span class="fc-red">￦<?=number_format($_SESSION["travel_step"]["2"]["sum_price"])?>원<span></p>
				</div>
			</div>

			<div class="button-center">
				<ul class="clearfix inb">
<?php
if(!$fg_bill_try) {
?>					
					<li>
						<a href="#" class="button gray" name="btnBack">이전</a>
					</li>
<?php
}
?>
					<li style="<?=$fg_bill_try?"width:100%;":""?>">
						<a href="#" class="button red" name="btnNext">카드결제</a>
<?/*						
						<input name="" type="button" class="btnBig m_block" value="카드 결제하기" onclick="alert('2020년 상반기 보안 프로토콜 업데이트에 따라서\n최신 버전이 아닌 브라우저에서는 결제 오류가\n발생 할 수 있습니다.\n최신버전의 브라우저를 사용해 주시기 바랍니다.');kcp_AJAX();"/>
*/?>						
					</li>
				</ul>
			</div>
		</div>
	</form>
</div>
<link rel="stylesheet" type="text/css" href="/travel/meritz/m/css/modal.css?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/meritz/m/css/modal.css")?>">

<script type="text/javascript">
$(document).on('click','a[name=btnNext]',function() {

	alert('2020년 상반기 보안 프로토콜 업데이트에 따라서\n최신 버전이 아닌 브라우저에서는 결제 오류가\n발생 할 수 있습니다.\n최신버전의 브라우저를 사용해 주시기 바랍니다.');
	kcp_AJAX();

});

$(document).on('click','a[name=btnBack]',function() {
<?php
if(!$fg_bill_try) {
?>					
	history.back();
<?php
} else {
?>
	history.go(-2);
<?php
}
?>
	/*
	document.frmNext.action = "step0102.php";
	document.frmNext.submit();
	*/
});	
</script>

<form name="pay_form" method="post" action="../../common/bill_hub_mobile.php">
    <input type="hidden" name="req_tx"         value="<?=$req_tx?>">               <!-- 요청 구분          -->
    <input type="hidden" name="res_cd"         value="<?=$res_cd?>">               <!-- 결과 코드          -->
    <input type="hidden" name="tran_cd"        value="<?=$tran_cd?>">              <!-- 트랜잭션 코드      -->
    <input type="hidden" name="ordr_idxx"      value="<?=$ordr_idxx?>">            <!-- 주문번호           -->
    <input type="hidden" name="good_mny"       value="<?=$good_mny?>">             <!-- 휴대폰 결제금액    -->
    <input type="hidden" name="good_name"      value="<?=$good_name?>">            <!-- 상품명             -->
    <input type="hidden" name="buyr_name"      value="<?=$buyr_name?>">            <!-- 주문자명           -->
    <input type="hidden" name="buyr_tel1"      value="<?=$buyr_tel1?>">            <!-- 주문자 전화번호    -->
    <input type="hidden" name="buyr_tel2"      value="<?=$buyr_tel2?>">            <!-- 주문자 휴대폰번호  -->
    <input type="hidden" name="buyr_mail"      value="<?=$buyr_mail?>">            <!-- 주문자 E-mail      -->
	<input type="hidden" name="cash_yn"		   value="<?=$cash_yn?>">              <!-- 현금영수증 등록여부-->
    <input type="hidden" name="enc_info"       value="<?=$enc_info?>">
    <input type="hidden" name="enc_data"       value="<?=$enc_data?>">
    <input type="hidden" name="use_pay_method" value="<?=$use_pay_method?>">
    <input type="hidden" name="cash_tr_code"   value="<?=$cash_tr_code?>">
    <!-- 추가 파라미터 -->
	<input type="hidden" name="param_opt_1"	   value="<?=$param_opt_1?>">
	<input type="hidden" name="param_opt_2"	   value="<?=$param_opt_2?>">
	<input type="hidden" name="param_opt_3"	   value="<?=$param_opt_3?>">
</form>

<?php
require_once $SYS_ROOT_DIR."/travel/meritz/m/modal/edit-info.php";
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>