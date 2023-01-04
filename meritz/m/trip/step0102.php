<?php 
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";

$pageStepNo = 1;
if(chk_step_session($pageStepNo)) {
	JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/meritz/m/trip/step0101.php");;
//	JsUtil::replace("/travel/meritz/m/trip/clear_to_step0101.php");;
}

//$trip_group_type = $_SESSION["travel_step"][1]["trip_group_type"];

$num_member = 1;

if (count($_SESSION['travel_step'][1]['member']) > 1) {
	$num_member = count($_SESSION['travel_step'][1]['member']);
}
?>
<div class="trip-wrap" data-role="page" id="second_page">
	<h2>여행자보험 가입</h2>

	<!-- /** 제목영역 -->
	<div class="title-wrap clearfix">
		<h3>1. 여행정보</h3>
		<div class="btn-right">
			<a id="btn-mod" class="button small red-line">정보수정</a>
		</div>
	</div>
	<!-- 제목영역 */ -->

	<form name="sendForm" method="post">
		<input type="hidden" name="auth_token" value="<?=$site_check_key?>">

		<div class="signUp-wrap">
			<h3 class="title">여행자 정보 <span name="spanCnt"></span></h3>
<?/*
		<input type="hidden" name="num_partner" value="<?=$rd_num?>"/>
*/?>		
			<input type="hidden" name="num_rd_gender" value="<?=$num_member?>"/>

<?
	if (count($_SESSION['travel_step'][1]['member']) < 1) {
?>			
			<div class="step divPartner">
				<h4>본인</h4>
				<ul class="clearfix inb">
					<li>
						<strong>생년월일</strong>
						<input type="tel" class="input01" name="birth[]" placeholder="예)19800101" maxlength="8">
					</li>
					<li>
						<strong>성별</strong>
						<input type="hidden" name="gender[]" class="hdn_gender" value="1" />
						<span class="choiceChk first man">
							<input type="radio" id="genderM1" value="1" name="gender1" checked='checked'>
							<label for="genderM1">남자</label>
						</span>
						<span class="choiceChk second wom">
							<input type="radio" id="genderW1" value="2" name="gender1">
							<label for="genderW1">여자</label>
						</span>
					</li>
				</ul>
			</div>
<?php
/*
		if ($trip_group_type==2) {
?>

			<div class="step divPartner">
				<h4>동반인 <span name="spanPartner">1</span>
					<a class="button small remove" name="btnDel">삭제</a>
				</h4>
				<ul class="clearfix inb">
					<li>
						<strong>생년월일</strong>
						<input type="tel" class="input01" name="birth[]" placeholder="예)19800101" maxlength="8">
					</li>
					<li>
						<strong>성별</strong>
						<input type="hidden" name="gender[]" class="hdn_gender" value="1" />
						<span class="choiceChk first">
							<input type="radio" id="genderM2" value="1" name="gender2" checked='checked'>
							<label for="genderM2">남자</label>
						</span>
						<span class="choiceChk second">
							<input type="radio" id="genderW2" value="2" name="gender2">
							<label for="genderW2">여자</label>
						</span>
					</li>
				</ul>
			</div>

			<div class="step last">
				<div class="button-center">
					<a href="#" class="button bule-line" name="btnAdd">동반인 추가</a>
				</div>
			</div>
<?
		}
*/		
	} else {
		for($i_member=0;$i_member<count($_SESSION['travel_step'][1]['member']);$i_member++) {

			if (empty($_SESSION['travel_step'][1]['member'][$i_member]["birth"]) || empty($_SESSION['travel_step'][1]['member'][$i_member]["gender"])) {
				JsUtil::alertReplace("이전 가입하던 정보가 유효하지 않습니다. 다시 입력해 주십시오.    ","clear_to_step0101.php");
			}
?>
			<div class="step divPartner">
<?
			if ($i_member < 1) {
?>
			
				<h4>본인</h4>
<?
			} else {
?>
				<h4>동반인 <span name="spanPartner"><?=$i_member?></span>
					<a class="button small remove" name="btnDel">삭제</a>
				</h4>
<?
			}
?>
				<ul class="clearfix inb">
					<li>
						<strong>생년월일</strong>
						<input type="tel" class="input01" name="birth[]" placeholder="예)19800101" maxlength="8" value="<?=$_SESSION['travel_step'][1]['member'][$i_member]["birth"]?>">
					</li>
					<li>
						<strong>성별</strong>
						<input type="hidden" name="gender[]" class="hdn_gender" value="<?=$_SESSION['travel_step'][1]['member'][$i_member]["gender"]?>" />
						<span class="choiceChk first man">
							<input type="radio" id="genderM<?=$i_member+1?>" value="1" name="gender<?=$i_member+1?>" <?=$_SESSION['travel_step'][1]['member'][$i_member]["gender"]=="1"?"checked=''checked":""?>>
							<label for="genderM<?=$i_member+1?>">남자</label>
						</span>
						<span class="choiceChk second wom">
							<input type="radio" id="genderW<?=$i_member+1?>" value="2" name="gender<?=$i_member+1?>" <?=$_SESSION['travel_step'][1]['member'][$i_member]["gender"]=="2"?"checked=''checked":""?>>
							<label for="genderW<?=$i_member+1?>">여자</label>
						</span>
					</li>
				</ul>
			</div>
<?			
		}
	}
?>
			<div class="step last">
				<div class="button-center">
					<a href="#" class="button bule-line" name="btnAdd">동반인 추가</a>
				</div>
			</div>
			<div class="button-center">
				<a href="#" class="button red" name="btnNext">계산하기</a>
			</div>
		</div>
	</form>
</div>

<form name="frmNext" method="post" action="step02.php">
	<input type="hidden" name="prevStepPage" value="step0102" />
</form>

<link rel="stylesheet" type="text/css" href="/travel/meritz/m/css/modal.css?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/meritz/m/css/modal.css")?>">
<script type="text/javascript" src="/travel/meritz/js/ValidCheck.js?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/meritz/js/ValidCheck.js")?>"></script>
<script type="text/javascript">
<?
/*
if(!$prevStepPage) {
?>
	$(document).ready(function() {
		if(!confirm("이전 가입하던 정보가 존재 합니다.\r\n\r\n이이서 계속 하시겠습니까?    ")) {
			location.href = "clear_to_step0101.php";
		}
	});
<?
}
*/
?>

$(document).ready(function() {
	numbering_partner();
});

$(document).on('change','input[type=radio]',function() {
	$(this).closest('li').children('.hdn_gender').val($(this).val());

	return false;
});

$(document).on('click','a[name=btnDel]',function() {

	$(this).closest('.divPartner').remove();
	$('span[name=spanCnt]').html(parseInt($('span[name=spanCnt]').html())-1);

	numbering_partner();

	return false;
});

$(document).on('click','a[name=btnAdd]',function() {

	let num_rd_gender = parseInt($('input[name=num_rd_gender]').val())+1;

	let obj_html = "<div class=\"step divPartner\">"
				+"		<h4>동반인 <span name=\"spanPartner\"></span> "
				+"			<a class=\"button small remove\" name=\"btnDel\">삭제</a> "
				+"		</h4> "
				+"		<ul class=\"clearfix inb\"> "
				+"			<li> "
				+"				<strong>생년월일</strong> "
				+"				<input type=\"tel\" class=\"input01\" name=\"birth[]\" placeholder=\"예)19800101\" maxlength=\"8\"> "
				+"			</li> "
				+"			<li> "
				+"				<strong>성별</strong> "
				+"				<input type=\"hidden\" name=\"gender[]\" class=\"hdn_gender\" value=\"1\" /> "
				+"				<span class=\"choiceChk first man\"> "
				+"					<input type=\"radio\" id=\"genderM"+num_rd_gender+"\" value=\"1\" name=\"gender"+num_rd_gender+"\" checked='checked'> "
				+"					<label for=\"genderM"+num_rd_gender+"\">남자</label> "
				+"				</span> "
				+"				<span class=\"choiceChk second wom\"> "
				+"					<input type=\"radio\" id=\"genderW"+num_rd_gender+"\" value=\"2\" name=\"gender"+num_rd_gender+"\"> "
				+"					<label for=\"genderW"+num_rd_gender+"\">여자</label> "
				+"				</span> "
				+"			</li> "
				+"		</ul> "
				+"	</div> ";

	$('.divPartner').last().after(obj_html);

//	$('input[name=num_partner]').val(parseInt($('input[name=num_partner]').val())+1);
	$('input[name=num_rd_gender]').val(num_rd_gender);

	numbering_partner();

	return false;
});

var numbering_partner = function() {
	$.each($('span[name=spanPartner]'), function(index, item) {
		$(this).html(index+1);
	});

	if($(".divPartner").length > 1) {
		$('span[name=spanCnt]').html("("+$(".divPartner").length+"명)");
	} else {
		$('span[name=spanCnt]').html("");
	}
}

$(document).on('click','a[name=btnNext]',function() {

	let f = document.sendForm;
	let partner_name;
	let fg_go = true;

	$.each($("input[name='birth[]']"), function(index, item) {

		if(index < 1) {
			partner_name = "본인";
		} else {
			partner_name = "동반인 "+ index;
		}

		if($(this).val()=="") {

			alert(partner_name+"의 생년월일을 입력해 주십시오.    ");
			$(this).focus();

			fg_go = false;
			return false;
		}

		if (!VC_ValidBirthday($(this).val())) {
			alert(partner_name+"의 생년월일을 정확히 입력해 주십시오.    ");
			$(this).focus();

			fg_go = false;
			return false;
		}
	});

	if(!fg_go) {
		return false;
	}

	$.ajax({
		type : "POST",
		url : "/travel/meritz/common/process_step0102.php",
		data : $('form[name=sendForm]').serialize(),
		dataType:"json",
		success : function(data, status) {

			if (data.result=="true") {
				location.href="step02.php";
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
</script>
<?php
require_once $SYS_ROOT_DIR."/travel/meritz/m/modal/edit-info.php";
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>