<? $mNum = "2";  $sNum = "5"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(5단계)";

require_once $SYS_ROOT_DIR."/travel/db/include/header_trip.php";
require_once $SYS_ROOT_DIR."/travel/db/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/db/common/function_step.php";

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
		
		$company_type = $row['company_type'];
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
		$sql="select a.* 
				, (SELECT cal_type FROM plan_code_longterm b WHERE b.company_type = '".$company_type."' AND b.member_no = a.member_no AND b.plan_code = a.plan_code AND b.trip_type = a.trip_type limit 1) AS cal_type
				from hana_plan_member_tmp a where tmp_no = '".$_POST[ "param_opt_1"]."' order by no";
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
					, 'cal_type'=>$row['cal_type']
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
		JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/db/m/trip/step0101.php");
//		JsUtil::replace("/travel/db/m/trip/clear_to_step0101.php");
		exit;
	}
}

$o_num = time()."_".rand(10000,99999);
$tripType = $_SESSION["travel_step"]["1"]["trip_type"];

require_once $SYS_ROOT_DIR."/travel/db/bill_kcp/cfg/site_conf_inc.php";
?>

<script type="text/javascript">
	function m_Completepayment( FormOrJson, closeEvent ) 
	{
		var frm = document.send_form; 
		GetField( frm, FormOrJson ); 
		
		if( frm.res_cd.value == "0000" ) {
			frm.submit(); 
		} else  {
			alert( "[" + frm.res_cd.value + "] " + frm.res_msg.value );
			closeEvent();
		}
	}
</script>
<script type="text/javascript" src='<?=$g_conf_js_url?>'></script>
<script type="text/javascript">
	/* 표준웹 실행 */
	function jsf__pay( form )
	{
		try
		{
			KCP_Pay_Execute( form ); 
		}
		catch (e)
		{
			/* IE 에서 결제 정상종료시 throw로 스크립트 종료 */ 
		}
	}             
</script>

<form id="send_form" name="send_form" action="../common_longterm/bill_hub.php" method="post">
<input type="hidden" id="auth_token" name="auth_token" readonly>

<input type="hidden" id="pay_method" name="pay_method" value="100000000000" readonly>
<input type="hidden" name="ordr_idxx" value="<?=$o_num?>" maxlength="40" readonly/>
<input type="hidden" name="good_name" value="유다이렉트(DB손보) 여행자보험" readonly/>
<input type="hidden" name="good_mny" value="<?=$_SESSION["travel_step"]["2"]["sum_price"]?>" maxlength="9" readonly/>
<input type="hidden" name="buyr_name" value="<?=stripslashes($_SESSION["travel_step"]["1"]["member"][0]["name"])?>" readonly/>
<input type="hidden" name="buyr_mail" value="" maxlength="30" readonly>
<input type="hidden" name="buyr_tel1" value="<?=$_SESSION["travel_step"]["1"]["member"][0]["hphone1"].$_SESSION["travel_step"]["1"]["member"][0]["hphone2"].$_SESSION["travel_step"]["1"]["member"][0]["hphone3"]?>" readonly>
<input type="hidden" name="buyr_tel2" value="" readonly/>
<input type="hidden" name="req_tx"          value="pay" />
<input type="hidden" name="site_cd"         value="<?=$g_conf_site_cd	?>" />
<input type="hidden" name="site_name"       value="<?=$g_conf_site_name ?>" />
<input type="hidden" name="quotaopt"        value="12"/>
<input type="hidden" name="currency"        value="WON"/>
<input type="hidden" name="module_type"     value="<?=$module_type ?>"/>
<input type="hidden" name="res_cd"          value=""/>
<input type="hidden" name="res_msg"         value=""/>
<input type="hidden" name="enc_info"        value=""/>
<input type="hidden" name="enc_data"        value=""/>
<input type="hidden" name="ret_pay_method"  value=""/>
<input type="hidden" name="tran_cd"         value=""/>
<input type="hidden" name="use_pay_method"  value=""/>
<input type="hidden" name="ordr_chk"        value=""/>
<input type="hidden" name="cash_yn"         value=""/>
<input type="hidden" name="cash_tr_code"    value=""/>
<input type="hidden" name="cash_id_info"    value=""/>
<input type="hidden" name="session_key"    value="<?=$_SESSION['travel_step'][4]["session_key"]?>"/>
<input type="hidden" name="good_expr" value="0">
<input type="hidden" name="used_card_YN" value="Y"/>

<?
$billing_card_val = $billing_card_company_common;
if (defined('_TOURSAFE_SUBSITE_BILLING_CARD')) {
	if (_TOURSAFE_SUBSITE_BILLING_CARD=="TYPE_1") {
		$billing_card_val = $billing_card_company;
	}
}
?>
<input type="hidden" name="used_card" value="<?=$billing_card_val?>"/>
</form>

<?php
require_once $SYS_ROOT_DIR."/travel/db/include/leftmenu_trip.php";
?>
	<div class="cont-trip">
		<div class="step-wrap">
			<h1>여행자보험 가입신청정보</h1>

			<div class="table-wrap">
				<table class="table-deepGray">
					<colgroup>
						<col width="20%">
						<col width="30%">
						<col width="20%">
						<col width="*">
					</colgroup>
					<tbody>
						<tr>
							<th class="type01">상품명</th>
							<td><?=$_SESSION["travel_step"]["1"]["trip_type"]=="1"?"국내":"해외"?>여행실손의료보험 - <?=$_SESSION["travel_step"]["2"]["plan_title"]?></td>
							<th class="type01">피보험자/계약자</th>
							<td><?=$_SESSION["travel_step"]["1"]["member"][0]["name"].(($_SESSION["travel_step"]["1"]["member"][0]["name_eng_last"] || $_SESSION["travel_step"]["1"]["member"][0]["name_eng_first"])?" / ".$_SESSION["travel_step"]["1"]["member"][0]["name_eng_last"]." ".$_SESSION["travel_step"]["1"]["member"][0]["name_eng_first"]:"")?></td>
						</tr>
						<tr>
							<th class="type01">출발 일시</th>
							<td><?=$_SESSION["travel_step"]["1"]["start_date"]." ".$_SESSION["travel_step"]["1"]["start_hour"]?>시</td>
							<th class="type01">도착 일시</th>
							<td><?=$_SESSION["travel_step"]["1"]["end_date"]." ".$_SESSION["travel_step"]["1"]["end_hour"]?>시</td>
						</tr>
						<tr>
							<th class="type01">여행목적<br/>(지역)</th>
							<td><?=$trip_purpose_array[$_SESSION["travel_step"]["1"]["trip_purpose"]]."<br/>(".$_SESSION["travel_step"]["1"]["nation_search"].")"?></td>
							<th class="type01">인원(<?=count($_SESSION["travel_step"]["1"]["member"])?>명)</th>
							<td>
<?php
	for($i=0;$i<count($_SESSION["travel_step"]["1"]["member"]);$i++) {
?>		
		<p><?=$_SESSION["travel_step"]["1"]["member"][$i]["name"]?>&nbsp;(<?=substr($_SESSION["travel_step"]["1"]["member"][$i]["birth"],2,6)?>) &nbsp; ￦<?=number_format($_SESSION["travel_step"]["1"]["member"][$i]["price"])?>원</p>
<?php		
	}
?>

							</td>
						</tr>
					</tbody>
				</table>

				<div class="total-wrap">
					<div class="title">총 금액(일시납)</div>
					<div class="total"><strong>￦<?=number_format($_SESSION["travel_step"]["2"]["sum_price"])?>원</strong></div> 
				</div>
			</div>

			<div class="button-area">
				<ul>
					<li>
						<a href="#" class="button gray" name="btnBack">이전</a>
					</li>
					<li>
						<a href="#" class="button red" name="btnNext">카드결제</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

<script type="text/javascript">

$(document).on('click','a[name=btnNext]',function() {

	alert('2020년 상반기 보안 프로토콜 업데이트에 따라서\n최신 버전이 아닌 브라우저에서는 결제 오류가\n발생 할 수 있습니다.\n최신버전의 브라우저를 사용해 주시기 바랍니다.');
	//jsf__pay(this.form);
	jsf__pay(document.send_form);
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
<?php
require_once $SYS_ROOT_DIR."/travel/db/include/footer_trip.php";
?>