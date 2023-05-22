<? $mNum = "2";  $sNum = "4"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(4단계)";

require_once $SYS_ROOT_DIR."/travel/meritz/include/header_trip.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";

$pageStepNo = 4;
if(chk_step_session($pageStepNo)) {
	JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/meritz/m/trip/step0101.php");
//	JsUtil::replace("/travel/meritz/m/trip/clear_to_step0101.php");
	exit;
}

require_once $SYS_ROOT_DIR."/travel/meritz/include/leftmenu_trip.php";

$tripType = $_SESSION["travel_step"]["1"]["trip_type"];
?>
	<div class="cont-trip">
		<div class="step-wrap">
			<h1>여행 출발전 고지사항
				<div class="button-right-area">
					<a class="button gray" name="all_check_type_n">전체 아니요</a>
				</div>
			</h1>

			<form name="sendForm" method="post">
				<input type="hidden" name="auth_token" value="<?=$site_check_key?>">

				<div class="disclaimer">
					<ul>

						<li class="title">
							1. 현재 해외 체류중이신가요? <br>
							<span class="accent">(해외 체류시 가입 불가. 국내 전 보험사 공통사항)</span>
						</li>
						<li class="choice">
						<span class="choiceChk first">
								<input type="radio" id="check_type1_y" name="check_type1" class="cls_check_type" value="Y" <?=$_SESSION["travel_step"][4]["check_type1"]=="Y"?"checked='checked'":""?>>
								<label for="check_type1_y">예</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="check_type1_n" name="check_type1" class="cls_check_type" value="N" <?=$_SESSION["travel_step"][4]["check_type1"]=="N"?"checked='checked'":""?>>
								<label for="check_type1_n">아니요</label>
							</span>
						</li>

						<li class="title">
							2. 최근 3개월 내에 <span id="btn-hosp" class="fc-red">입원, 수술, 질병확진[보기]</span>을 받은 사실이 있나요?
						</li>
						<li class="choice">
						<span class="choiceChk first">
								<input type="radio" id="check_type2_y" name="check_type2" class="cls_check_type" value="Y" <?=$_SESSION["travel_step"][4]["check_type2"]=="Y"?"checked='checked'":""?>>
								<label for="check_type2_y">예</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="check_type2_n" name="check_type2" class="cls_check_type" value="N" <?=$_SESSION["travel_step"][4]["check_type2"]=="N"?"checked='checked'":""?>>
								<label for="check_type2_n">아니요</label>
							</span>
						</li>

						<li class="title">
							3. 위험한 운동이나 전문적인 체육활동을 목적으로 출국하시나요?
						</li>
						<li class="choice">
						<span class="choiceChk first">
								<input type="radio" id="check_type3_y" name="check_type3" class="cls_check_type" value="Y" <?=$_SESSION["travel_step"][4]["check_type3"]=="Y"?"checked='checked'":""?>>
								<label for="check_type3_y">예</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="check_type3_n" name="check_type3" class="cls_check_type" value="N" <?=$_SESSION["travel_step"][4]["check_type3"]=="N"?"checked='checked'":""?>>
								<label for="check_type3_n">아니요</label>
							</span>
						</li>

						<li class="title">
							4. 여행지역이 <span id="btn-restr" class="fc-red">여행금지국가[보기]</span>인가요?
						</li>
						<li class="choice">
							<span class="choiceChk first">
								<input type="radio" id="check_type4_y" name="check_type4" class="cls_check_type" value="Y" <?=$_SESSION["travel_step"][4]["check_type4"]=="Y"?"checked='checked'":""?>>
								<label for="check_type4_y">예</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="check_type4_n" name="check_type4" class="cls_check_type" value="N" <?=$_SESSION["travel_step"][4]["check_type4"]=="N"?"checked='checked'":""?>>
								<label for="check_type4_n">아니요</label>
							</span>
						</li>


					</ul>
				</div>

				<h1>이용동의 [필수]
					<div class="button-right-area">
						<a class="button gray" name="all_agree">전체 동의</a>
					</div>
				</h1>
				<div class="accord-wrap">
					<div class="accorda">
						<ul>
							<li class="title">이용약관</li>
							<li class="cont"><a id="btn-agre" class="button gray-line">내용확인</a></li>
							<li class="choice">
							<span class="choiceChk first">
									<input type="radio" id="chk1_y" name="chk1" class="cls_chk" value="Y" <?=$_SESSION["travel_step"][4]["chk1"]=="Y"?"checked='checked'":""?>>
									<label for="chk1_y">동의</label>
								</span>
								<span class="choiceChk second">
									<input type="radio" id="chk1_n" name="chk1" class="cls_chk" value="N" <?=$_SESSION["travel_step"][4]["chk1"]!="Y"?"checked='checked'":""?>>
									<label for="chk1_n">동의안함</label>
								</span>
							</li>
						</ul>
					</div>
					<div class="accorda">
						<ul>
							<li class="title">개인정보수집 및 이용 동의</li>
							<li class="cont"><a id="btn-priv" class="button gray-line">내용확인</a></li>
							<li class="choice">
							<span class="choiceChk first">
								<input type="radio" id="select_agree_y" name="select_agree" class="cls_chk" value="Y" <?=$_SESSION["travel_step"][4]["select_agree"]=="Y"?"checked='checked'":""?>>
								<label for="select_agree_y">동의</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="select_agree_n" name="select_agree" class="cls_chk" value="N" <?=$_SESSION["travel_step"][4]["select_agree"]!="Y"?"checked='checked'":""?>>
								<label for="select_agree_n">동의안함</label>
							</span>
							</li>
						</ul>
					</div>

					<!-- /** 개인정보 처리 및 단체가입규약 동의 -->
					<div class="terms">	
						<div class="btn"><a id="btn-colle" class="button gray-line">내용확인</a></div>
						<div class="Choice">
							<span class="choiceChk first">
								<input type="radio" id="chk3_y" name="chk3" class="cls_chk" value="Y" <?=$_SESSION["travel_step"][4]["chk3"]=="Y"?"checked='checked'":""?>>
								<label for="chk3_y">동의</label>
							</span>
							<span class="choiceChk second">
								<input type="radio" id="chk3_n" name="chk3" class="cls_chk" value="N" <?=$_SESSION["travel_step"][4]["chk3"]!="Y"?"checked='checked'":""?>>
								<label for="chk3_n">동의안함</label>
							</span>
						</div>
						<div class="terms-list">
							<dl>
								<dt>개인정보 처리 및 단체가입규약 동의</dt>
								<dd>
									<ul>
										<li>
											<span>- 단체가입규약 동의</span>
										</li>
										<li class="choice-acc">
											<span class="choiceChk first">
												<input type="radio" id="chk3_1_y" name="chk3_1" class="cls_chk cls_chk3" value="Y" <?=$_SESSION["travel_step"][4]["chk3_1"]=="Y"?"checked='checked'":""?>>
												<label for="chk3_1_y">동의</label>
											</span>
											<span class="choiceChk second">
												<input type="radio" id="chk3_1_n" name="chk3_1" class="cls_chk cls_chk3" value="N" <?=$_SESSION["travel_step"][4]["chk3_1"]!="Y"?"checked='checked'":""?>>
												<label for="chk3_1_n">동의안함</label>
											</span>
										</li>
										
										<li>
											<span>- 개인정보 수집 및 이용 및 제3자 제공 동의</span>
										</li>
										<li class="choice-acc">
											<span class="choiceChk first">
												<input type="radio" id="chk3_2_y" name="chk3_2" class="cls_chk cls_chk3" value="Y" <?=$_SESSION["travel_step"][4]["chk3_2"]=="Y"?"checked='checked'":""?>>
												<label for="chk3_2_y">동의</label>
											</span>
											<span class="choiceChk second">
												<input type="radio" id="chk3_2_n" name="chk3_2" class="cls_chk cls_chk3" value="N" <?=$_SESSION["travel_step"][4]["chk3_2"]!="Y"?"checked='checked'":""?>>
												<label for="chk3_2_n">동의안함</label>
											</span>
										</li>
										
										<li>
											<span>- 고유식별 정보 수집 및 이용제공 및 제3자 제공 동의</span>
										</li>
										<li class="choice-acc">
											<span class="choiceChk first">
												<input type="radio" id="chk3_3_y" name="chk3_3" class="cls_chk cls_chk3" value="Y" <?=$_SESSION["travel_step"][4]["chk3_3"]=="Y"?"checked='checked'":""?>>
												<label for="chk3_3_y">동의</label>
											</span>
											<span class="choiceChk second">
												<input type="radio" id="chk3_3_n" name="chk3_3" class="cls_chk cls_chk3" value="N" <?=$_SESSION["travel_step"][4]["chk3_3"]!="Y"?"checked='checked'":""?>>
												<label for="chk3_3_n">동의안함</label>
											</span>
										</li>
										
										<li>
											<span>- 마케팅 활용을 위한 개인정보 수집 및 이용 동의 (선택)</span>
										</li>
										<li class="choice-acc">
											<span class="choiceChk first">
												<input type="radio" id="check_type_marketing_y" name="check_type_marketing" class="cls_chk cls_chk3" value="Y" <?=$_SESSION["travel_step"][4]["check_type_marketing"]=="Y"?"checked='checked'":""?>>
												<label for="check_type_marketing_y">동의</label>
											</span>
											<span class="choiceChk second">
												<input type="radio" id="check_type_marketing_n" name="check_type_marketing" class="cls_chk cls_chk3" value="N" <?=$_SESSION["travel_step"][4]["check_type_marketing"]!="Y"?"checked='checked'":""?>>
												<label for="check_type_marketing_n">동의안함</label>
											</span>
										</li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<!-- 개인정보 처리 및 단체가입규약 동의 */ -->

					<div class="accorda">
						<ul>
							<li class="title">보험약관
							<!-- 변경해야 함 -->
								<a href="/travel/meritz/files/domestic.pdf" class="button red-line" target="_blank">장기해외여행보험약관 다운로드</a>
							<!-- 변경해야 함 -->
							</li>
							<li class="cont">
								<a id="btn-insu" class="button gray-line">내용확인</a>
							</li>
							<li class="choice">
								<span class="choiceChk first">
									<input type="radio" id="chk4_y" name="chk4" class="cls_chk" value="Y" <?=$_SESSION["travel_step"][4]["chk4"]=="Y"?"checked='checked'":""?>>
									<label for="chk4_y">동의</label>
								</span>
								<span class="choiceChk second">
									<input type="radio" id="chk4_n" name="chk4" class="cls_chk" value="N" <?=$_SESSION["travel_step"][4]["chk4"]!="Y"?"checked='checked'":""?>>
									<label for="chk4_n">동의안함</label>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</form>
			<div class="button-area">
				<ul>
					<li>
						<a href="#" class="button gray" name="btnBack">이전</a>
					</li>
					<li>
						<a href="#" class="button red" name="btnNext">최종 확인 및 결제</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

<?php 
require_once $SYS_ROOT_DIR."/travel/meritz/modal/agreement.php"; //이용약관	btn-agre
require_once $SYS_ROOT_DIR."/travel/meritz/modal/insurance.php"; //보험약관	btn-insu
require_once $SYS_ROOT_DIR."/travel/meritz/modal/collective.php"; //개인정보 처리 및 단체가입규약 동의	btn-colle
require_once $SYS_ROOT_DIR."/travel/meritz/modal/marketing.php"; //마케팅 활용 동의	btn-mark
require_once $SYS_ROOT_DIR."/travel/meritz/modal/privacy.php"; //개인정보수집 및 이용	btn-priv

require_once $SYS_ROOT_DIR."/travel/meritz/modal/hospitalize.php"; //입원, 수술, 질병확진 btn-hosp
require_once $SYS_ROOT_DIR."/travel/meritz/modal/specific.php"; //특정질병 btn-spec
require_once $SYS_ROOT_DIR."/travel/meritz/modal/sports.php"; //위험한 레포츠 btn-sport
require_once $SYS_ROOT_DIR."/travel/meritz/modal/restrict.php"; //보험인수 제한 국가 안내 btn-restr
?>

<link rel="stylesheet" type="text/css" href="/travel/meritz/css/modal.css?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/meritz/css/modal.css")?>">
<script type="text/javascript">
	$('.terms-list dt').click(function() {

		var myList = $(this).next('dd');

		if(!$(this).hasClass('selected')) {
			$('.terms-list dt').removeClass('selected');
			$(this).addClass('selected');
			$('.terms-list dd').hide();
			myList.show();
		} else {

			$(this).removeClass('selected');
			myList.hide();
		}

		//        if(myList.css('display') == 'none') {
		//            $('.terms-list dd').hide();
		//            myList.show();
		//        }
		return false;
	});

	$(document).ready(function() {

		$(document).on('click', 'a[name=all_check_type_n]', function() {
			$('.cls_check_type[value=N]').prop("checked", true);
		});

		$(document).on('click', 'a[name=all_agree]', function() {
			$('.cls_chk[value=Y]').prop("checked", true);
		});

		$(document).on('change','input[name=chk3]',function() {
			$('.cls_chk3[value='+$(this).val()+']').prop("checked", true);
		});

		$(document).on('change','.cls_chk3',function() {
			chk3_agree_all_agree();
		});

	});

var chk3_agree_all_agree = function() {
	if ($('.cls_chk3[value=Y]:checked').length == $('.cls_chk3[value=Y]').length) {
		$('input[name=chk3][value=Y]').prop("checked", true);
	} else {
		$('input[name=chk3][value=N]').prop("checked", true);
	}
}

$(document).on('click','a[name=btnNext]',function() {

	let f = document.sendForm;

	if ($('.cls_check_type:checked').length != $('.cls_check_type[value=N]').length) {
		alert('여행 출발전 고지사항을 선택해 주세요.');
		return false;
	}

	if ($('.cls_check_type[value=N]:checked').length != $('.cls_check_type[value=N]').length) {
		alert('여행 출발전 고지사항 중 예가 선택되어 있으면 다음단계로 진행 할 수 없습니다.');
		return false;
	}

	if ($("input:radio[name='chk1']:checked").val() == "N") {
		alert('이용약관에 동의해 주세요.');
		$(this).focus();
		return false;
	}

	if ($("input:radio[name='select_agree']:checked").val() == "N") {
		alert('개인정보 수집 및 이용에 동의해 주세요.');
		$(this).focus();
		return false;
	}

	//		if ($("input:checkbox[name='chk3']").is(":checked") == false) {
	if ($("input:radio[name='chk3_1']:checked").val() == "N" && $("input:radio[name='chk3_2']:checked").val() == "N" && $("input:radio[name='chk3_3']:checked").val() == "N") {
		alert('개인정보 처리 및 단체가입규약에  동의해 주세요.');
		return false;
	}

	if ($("input:radio[name='chk3_1']:checked").val() == "N") {
		alert('단체규약(단체가입규약)에  동의해 주세요.');
		$(this).focus();
		return false;
	}

	if ($("input:radio[name='chk3_2']:checked").val() == "N") {
		alert('단체규약(개인정보 수집 및 이용 및 제3자 제공)에  동의해 주세요.');
		$(this).focus();
		return false;
	}

	if ($("input:radio[name='chk3_3']:checked").val() == "N") {
		alert('단체규약(고유식별 정보 수집 및 이용제공 및 제3자 제공)에  동의해 주세요.');
		$(this).focus();
		return false;
	}

	if ($("input:radio[name='chk4']:checked").val() == "N") {
		alert('보험약관에  동의해 주세요.');
		$(this).focus();
		return false;
	}

	<?/*		
	f.action = "../../common/process_step04.php";
	f.submit();
	return false;
	*/?>		
	$.ajax({
		type : "POST",
		url : "/travel/meritz/common_longterm/process_step04.php",
		data : $('form[name=sendForm]').serialize(),
		dataType:"json",
		success : function(data, status) {

			if (data.result=="true") {
				location.href="step05.php";
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
require_once $SYS_ROOT_DIR."/travel/meritz/include/footer_trip.php";
?>