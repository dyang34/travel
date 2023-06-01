<? $mNum = "2";  $sNum = "3"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(3단계)";

require_once $SYS_ROOT_DIR."/travel/db/include/header_trip.php";
require_once $SYS_ROOT_DIR."/travel/db/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/db/common/function_step.php";

$pageStepNo = 3;
if(chk_step_session($pageStepNo)) {
	JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/db/m/trip/step0101.php");
//	JsUtil::replace("/travel/db/m/trip/clear_to_step0101.php");
	exit;
}

$arrMember = $_SESSION["travel_step"]["1"]["member"];

require_once $SYS_ROOT_DIR."/travel/db/include/leftmenu_trip.php";
?>
	<div class="cont-trip">
		<div class="step-wrap">

		<form name="sendForm" method="post">
		<input type="hidden" name="auth_token" value="<?=$site_check_key?>">

<?php
for($i=0;$i<count($arrMember);$i++) {
	if($i < 1) {
?>
			<div class="self step03">
				<h2>대표피보험자 (<?=$arrMember[$i]['gender']=="1"?"<strong class=\"man\">남</strong>":"<strong class=\"wom\">여</strong>"?>)</h2>
<?php
	} else {
?>
			<div class="companion step03">
				<h2>동반인 <?=$i?> (<?=$arrMember[$i]['gender']=="1"?"<strong class=\"man\">남</strong>":"<strong class=\"wom\">여</strong>"?>)</h2>
<?php
	}
?>
				<ul class="Sign-up rep">
					<li>
						<strong>성명 (한글)</strong>
						<input type="text" name="name[]" class="input01" placeholder="홍길동" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['name']?>">
					</li>
					<li>
						<strong>성명 (영문) <span class="caps">※ 선택사항 : 영문증서 필요시기입</span></strong>
						<input type="text" name="name_eng_last[]" class="input01 first-name" pattern="[A-Za-z]+" placeholder="성" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['name_eng_last']?>" oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '');">
						<input type="text" name="name_eng_first[]" class="input01 last-name" pattern="[A-Za-z]+" placeholder="이름" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['name_eng_first']?>" oninput="this.value = this.value.replace(/[^A-Za-z\s.]/g, '');">
					</li>
					<li>
						<strong>주민등록번호</strong>
						<input type="tel" class="input01 number first" placeholder="앞 6자리" value="<?=substr($arrMember[$i]['birth'],2,6)?>" readonly>
						<span class="number">-</span>
						<input type="password" class="input01 number" gender="<?=$arrMember[$i]['gender']?>" name="jumin2[]" placeholder="*******" maxlength="7" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['jumin2']?>">
					</li>
					<li>
						<strong>영주권자 / 이중국적자
							<span name="spanCaution" class="spanCaution" style="display:<?=$_SESSION["travel_step"]["1"]["member"][$i]['is_dual']=="Y"?"inline-block":"none"?>;"> ※ 모국 여행은 가입 불가!</span>
						</strong>						
						<input type="hidden" name="is_dual[]" value="N" class="hdn_is_dual" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['is_dual']?>" />
						<span class="choiceChk first">
							<input type="radio" id="dualY_<?=$i?>" name="is_dual_<?=$i?>" value="Y" class="rd_dual" <?=$_SESSION["travel_step"]["1"]["member"][$i]['is_dual']=="Y"?"checked='checked'":""?>>
							<label for="dualY_<?=$i?>">예</label>
						</span>
						<span class="choiceChk second">
							<input type="radio" id="dualN_<?=$i?>"  name="is_dual_<?=$i?>" value="N" class="rd_dual" <?=$_SESSION["travel_step"]["1"]["member"][$i]['is_dual']!="Y"?"checked='checked'":""?>>
							<label for="dualN_<?=$i?>">아니요</label>
						</span>
						<div class="nationality" name="divNation" style="display:<?=$_SESSION["travel_step"]["1"]["member"][$i]['is_dual']=="Y"?"block":"none"?>;">
							<input type="text" class="input01" placeholder="미국" name="nation_name[]" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['nation_name']?>">
							<div class="caption">※ 해당 국가를 입력하여 주시기 바랍니다.</div>
						</div>
					</li>
<?php					
	if($i < 1) {
?>
					<li>
						<strong>휴대폰 번호</strong>
						<div class="select-box">
							<select name="hphone1">
								<option value="010" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="010"?"selected='selected'":""?>>010</option>
								<option value="011" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="011"?"selected='selected'":""?>>011</option>
								<option value="016" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="016"?"selected='selected'":""?>>016</option>
								<option value="017" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="017"?"selected='selected'":""?>>017</option>
								<option value="018" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="018"?"selected='selected'":""?>>018</option>
								<option value="019" <?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone1']=="019"?"selected='selected'":""?>>019</option>
							</select>
						</div>
						<span class="tel">-</span>
						<input type="tel"  class="input01 tel" placeholder="2345" maxlength='4' name="hphone2" oninput="maxLengthCheck(this, 'hphone3')" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone2']?>">
						<span class="tel">-</span>
						<input type="tel"  class="input01 tel" placeholder="6789" maxlength='4' id="hphone3" name="hphone3" oninput="maxLengthCheck(this, 'email1')" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['hphone3']?>">
					</li>
					<li>
						<strong>이메일</strong>
						<input type="text" name="email1" id="email1" class="input01 email first" placeholder="hong" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['email1']?>">
						<span class="email">@</span>
						<input type="email"  name="email2"class="input01 email first" placeholder="naver.com" value="<?=$_SESSION["travel_step"]["1"]["member"][$i]['email2']?>">
					</li>
<?php
	}
?>			

				</ul>
			</div>
<?php
}
?>			
			</form>

			<div class="button-area">
				<ul>
					<li>
						<a href="#" class="button gray" name="btnBack">이전</a>
					</li>
					<li>
						<a href="#" class="button red" name="btnNext">다음</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

<script type="text/javascript" src="/travel/db/js/ValidCheck.js?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/js/ValidCheck.js")?>"></script>
<script type="text/javascript">
$(document).on('change','.rd_dual',function() {

	obj_spanCaution = $(this).closest('li').find('span[name=spanCaution]');
	obj_divNation = $(this).closest('li').children('div[name=divNation]');

	$(this).closest('li').children('.hdn_is_dual').val($(this).val());

	if($(this).val()=="Y") {
		obj_spanCaution.show();
		obj_divNation.show();
	} else {
		obj_spanCaution.hide();
		obj_divNation.hide();
	}

	return false;
});

var getTitle = function(index) {
	if(index < 1) {
		return "대표피보험자";
	} else {
		return "동반인 "+ index;
	}
}

$(document).on('click','a[name=btnNext]',function() {

	let f = document.sendForm;
	let fg_go = true;

	const reg_jumin2 = /^[1-8]\d{6}$/;
	const reg_email = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/;

	$.each($("input[name='name[]']"), function(index, item) {

		if($(this).val()=="") {
			alert(getTitle(index)+"의 성명(한글)을 입력해 주십시오.    ");
			$(this).focus();

			fg_go = false;
			return false;
		}
	});

	if(!fg_go) {
		return false;
	}

	$.each($("input[name='jumin2[]']"), function(index, item) {

		if($(this).val()=="") {

			alert(getTitle(index)+"의 주민등록번호 뒷자리를 입력해 주십시오.    ");
			$(this).focus();

			fg_go = false;
			return false;
		}

		if (!reg_jumin2.test($(this).val())) {
			alert(getTitle(index)+"의 주민등록번호 뒷자리를 정확히 입력해 주십시오.    ");
			$(this).focus();

			fg_go = false;
			return false;
		}

		if((parseInt($(this).attr('gender'))%2) != (parseInt($(this).val().substr(0, 1))%2)) {

			fg_go = false;
			if(confirm("["+getTitle(index)+" 정보 불일치]\r\n\r\n보험료 계산시 입력한 여행자 정보와 입력하신 주민등록번호 성별이 다릅니다.\r\n여행자 정보 수정 후 보험료를 다시 계산하셔야 합니다.\r\n1단계로 이동 하시겠습니까?")) {
				location.href="step0102.php";
				return false;
			} else {
				return false;
			}
		}
	});

	if(!fg_go) {
		return false;
	}

	$.each($("input[name='is_dual[]']"), function(index, item) {

		if($(this).val()=="Y") {

			var obj = $(this).closest('li').find("input[name='nation_name[]']");

			if(obj.val() == "") {
				alert(getTitle(index)+"의 영주권(이중국적) 해당국을 입력해십시오.    ");
				obj.focus();

				fg_go = false;
				return false;
			}
		}
	});

	if(!fg_go) {
		return false;
	}

	if ( VC_inValidText(f.hphone2, "휴대폰 번호") ) return false;
	if ( VC_inValidText(f.hphone3, "휴대폰 번호") ) return false;
	if ( VC_inValidNumber(f.hphone2, "휴대폰 번호") ) return false;
	if ( VC_inValidNumber(f.hphone3, "휴대폰 번호") ) return false;
	
	if ( VC_inValidLength(f.hphone2, 3, "휴대폰 번호") ) { return; }
	if ( VC_inValidLength(f.hphone3, 4, "휴대폰 번호") ) { return; }

	if ( VC_inValidText(f.email1, "이메일 주소") ) return false;
	if ( VC_inValidText(f.email2, "이메일 주소") ) return false;

	if (!reg_email.test($('input[name=email2]').val())) {
		alert("이메일 주소를 정확히 입력해 주십시오.    ");
		$('input[name=email2]').focus();
		return false;
	}

	$.ajax({
		type : "POST",
		url : "/travel/db/common/process_step03.php",
		data : $('form[name=sendForm]').serialize(),
		dataType:"json",
		success : function(data, status) {

			if (data.result=="true") {
				location.href="step04.php";
				//document.frmNext.submit();
			} else {
				alert(data.msg);
			}

			return false;
		},
		error : function(err)
		{
			alert(err.responseText);
		
			return false;
		}
	}); // ajax end

	return false;
});

$(document).on('click','a[name=btnBack]',function() {
	history.back();

	/*
	document.frmNext.action = "step0102.php";
	document.frmNext.submit();
	*/
});


</script>
<?php
require_once $SYS_ROOT_DIR."/travel/db/include/footer_trip.php";
?>