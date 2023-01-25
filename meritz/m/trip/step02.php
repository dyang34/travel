<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(2단계)";

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";
require_once $SYS_ROOT_DIR."/travel/meritz/config/get_site_config_member_no.php";

$pageStepNo = 2;
if(chk_step_session($pageStepNo)) {
	JsUtil::alertReplace("이전 가입하던 정보가 존재하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/meritz/m/trip/step0101.php");
//	JsUtil::replace("/travel/meritz/m/trip/clear_to_step0101.php");
	exit;
}

$tripType = $_SESSION["travel_step"]["1"]["trip_type"];
$start_date = $_SESSION["travel_step"]["1"]["start_date"];
$start_hour = $_SESSION["travel_step"]["1"]["start_hour"];
$end_date = $_SESSION["travel_step"]["1"]["end_date"];
$end_hour = $_SESSION["travel_step"]["1"]["end_hour"];

$plan_type = $_SESSION["travel_step"]["2"]["plan_type"];

$start_date_arr=explode("-",$start_date);
$start_time=mktime($start_hour,"00","00",$start_date_arr[1],$start_date_arr[2],$start_date_arr[0]);

$end_date_arr=explode("-",$end_date);
$end_time=mktime($end_hour,"00","00",$end_date_arr[1],$end_date_arr[2],$end_date_arr[0]);

//2019-07-24 $term_day 상품별 여행기간 계산 추가 - 박우철
//$term_day=ceil(($end_time-$start_time)/86400);
$term_day = travel_period($start_date." ".$start_hour.":00:00", $end_date." ".$end_hour.":00:00"); 
//2019-07-24 $term_day 상품별 여행기간 계산 추가 - 박우철
//2019-07-03 해외 여행 80대(보험나이) 1개월 이상 보험가입 금지 - 박우철

if ($tripType=="1") {
	if ($term_day > 30) {
		$term_day=30;
	}
} elseif ($tripType=="2") {
	if ($term_day > 90) {
		$term_day = 90;
	}
}

if ($term_day < "0") {
	JsUtil::alertReplace("이전 가입 진행 정보가 유효하지 않습니다.\\r\\n\\r\\다시 입력해 주십시오.","/travel/meritz/m/trip/clear_to_step0101.php");
	exit;
}

$cur_date=date("Y-m-d");
$cal_type_array=array();
$arrMember = array();

$sql="select * from plan_code_type_hana where company_type=2 and title <> '' and member_no='".$site_config_type_member_no."' and trip_type='".$tripType."' order by no asc";
$result=mysql_query($sql, $conn);

$arrPlanTypeList = array();
while($row=mysql_fetch_assoc($result)) {
	array_push($arrPlanTypeList, $row);	
}

for ($i=0;$i<count($_SESSION["travel_step"]["1"]["member"]);$i++) {
	if ($_SESSION["travel_step"]["1"]["member"][$i]["birth"]!='' && $_SESSION["travel_step"]["1"]["member"][$i]["gender"]!='') {

		$birth_date=substr($_SESSION["travel_step"]["1"]["member"][$i]["birth"],0,4)."-".substr($_SESSION["travel_step"]["1"]["member"][$i]["birth"],4,2)."-".substr($_SESSION["travel_step"]["1"]["member"][$i]["birth"],6,2);
		
		list($cal_age,$term_year) = age_cal($start_date,$birth_date);	// cal_age 보험나이, term_year 만나이.
		
		if ($cal_age > 100) {
		    $cal_age=100;
		}
		
		if ($tripType=="2") {
			if ($cal_age >= 0 && $cal_age <= 14) {
				$cal_type="1";
			} elseif ($cal_age >= 15 && $cal_age <= 69) {
				$cal_type="2";
			} elseif ($cal_age >= 70 && $cal_age <= 79) {
				$cal_type="3";
			} elseif ($cal_age >= 80) {
				$cal_type="4";
			}
		} elseif ($tripType=="1") {
			if ($cal_age >= 0 && $cal_age <= 14) {
				$cal_type="1";
			} elseif ($cal_age >= 15 && $cal_age <= 69) {
				$cal_type="2";
			} elseif ($cal_age >= 70 && $cal_age <= 79) {
				$cal_type="3";
			} elseif ($cal_age >= 80) {
				$cal_type="4";
			}
		}

		array_push($cal_type_array, $cal_type);
		array_push($arrMember, array('gender' => $_SESSION["travel_step"]["1"]["member"][$i]["gender"], 'cal_age'=>$cal_age));
	}
}

$cal_type_query=implode( ',', array_unique($cal_type_array) );

$sql="select plan_title, left(MIN(plan_type),1) as plan_type_src from plan_code_hana where company_type=2 and member_no='".$site_config_member_no
	."' and trip_type='".$tripType
	."' and cal_type in (".$cal_type_query.") group by plan_title order by plan_type desc";
$result=mysql_query($sql, $conn);

$arrPlanList = array();
while($row=mysql_fetch_assoc($result)) {
	array_push($arrPlanList, $row);	
}

for($i=0;$i<count($arrPlanList);$i++) {

	$sql="select * from plan_code_hana where company_type=2 and member_no='".$site_config_member_no."' and trip_type='".$tripType."' 
			and plan_type like '%".$arrPlanList[$i]["plan_type_src"]."%' order by cal_type asc";

	$rs_plan_list_detail=mysql_query($sql, $conn);

	$arrPlanListDetail = array();
	while($row_plan_list_detail=mysql_fetch_assoc($rs_plan_list_detail)) {
		array_push($arrPlanListDetail, $row_plan_list_detail);	
	}

	$arrPlanList[$i]['plan_list'] = $arrPlanListDetail;

	$sum_price = 0;
	for($i_member=0;$i_member<count($arrMember);$i_member++) {
		$sql_price="select price from plan_code_price_hana where company_type=2 and member_no='".$site_config_member_no."' and trip_type='".$tripType."' 
			and plan_type like '%".$arrPlanList[$i]["plan_type_src"]."%' and sex = '".$arrMember[$i_member]["gender"]."' and age = '".$arrMember[$i_member]["cal_age"]."' and term_day >= '".$term_day."' order by term_day asc limit 1";

		$rs_plan_price=mysql_query($sql_price, $conn);
		//$row_plan_price = $rs_plan_price->fetch_assoc();

		$row_plan_price=mysql_fetch_assoc($rs_plan_price);

		$sum_price += $row_plan_price["price"];
	}

	$arrPlanList[$i]["sum_price"] = $sum_price;
}
?>
<div class="trip-wrap">
	<h2>여행자보험 가입</h2>

	<!-- /** 제목영역 -->
	<div class="title-wrap clearfix">
		<h3>2. 보험료 계산결과</h3>
		<div class="btn-right">
			<a id="btn-mod" class="button small red-line">정보수정</a>
		</div>
	</div>
	<!-- 제목영역 */ -->

	<div class="signUp-wrap">
		<h3 class="title">보험료 계산 결과 - 플랜 선택</h3>
		<div class="table-wrap">
			<div class="tab">
<?php
	for($i=0;$i<count($arrPlanList);$i++) {
		if (empty($plan_type)) {
			$plan_type = $arrPlanList[$i]["plan_type_src"];
		}
?>
				<button class="tablinks" plan_type="<?=$arrPlanList[$i]["plan_type_src"]?>" plan_title="<?=$arrPlanList[$i]["plan_title"]?>" sum_price="<?=$arrPlanList[$i]["sum_price"]?>">
					<!-- /* 라디오버튼 추가작업 22.11.16 -->
					<input type="radio" name="" id="" class="" value="">
					<label class="radiobox"></label>
					<?=$arrPlanList[$i]["plan_title"]?><br/>(￦<?=number_format($arrPlanList[$i]["sum_price"])?> 원)
				</button>
<?php
	}
?>
			</div>
<?php
	for($i=0;$i<count($arrPlanList);$i++) {
?>
			<div class="tabcontent" plan_type="<?=$arrPlanList[$i]["plan_type_src"]?>">
				<table class="table-red">
					<colgroup>
						<col width="*">
<?php
		for($i_cal_type=0;$i_cal_type<count($arrPlanList[$i]['plan_list']);$i_cal_type++) {
?>
						<col width="17%">
<?php
		}
?>
					</colgroup>
					<thead>
						<tr>
							<th rowspan="2">보장명</th>
							<th colspan="<?=count($arrPlanList[$i]['plan_list'])?>">보장 금액</th>
						</tr>
						<tr>
<?php
		for($i_cal_type=0;$i_cal_type<count($arrPlanList[$i]['plan_list']);$i_cal_type++) {

?>
							<th><?=$arrPlanList[$i]['plan_list'][$i_cal_type]['plan_start_age']?> ~ <?=$arrPlanList[$i]['plan_list'][$i_cal_type]['plan_end_age']?>세</th>
<?php
		}
?>
						</tr>
					</thead>
					<tbody>
<?php
		for($i_type=0;$i_type<count($arrPlanTypeList);$i_type++) {
?>
						<tr>
							<th><?=$arrPlanTypeList[$i_type]['title']?>
								<div class="tooltip">
									<span>?</span>
									<div class="tooltip-content">
									<?=$arrPlanTypeList[$i_type]['content']?>
									</div>
								</div>
							</th>
<?php
			for($i_cal_type=0;$i_cal_type<count($arrPlanList[$i]['plan_list']);$i_cal_type++) {
?>
							<td class="<?=in_array(($i_cal_type+1), $cal_type_array)?"select":""?>"><?=kor_won_comma_span($arrPlanList[$i]['plan_list'][$i_cal_type][$arrPlanTypeList[$i_type]['plan_type']])?></td>
<?php
			}
?>								
						</tr>
<?php
		}
?>
					</tbody>
				</table>
				<p class="caption">
					※ 중도해지시 해지환급금은 납입한 보험료보다 적거나 없을 수 있습니다.
				</p>
			</div>
<?php
	}
?>
		</div>

		<div class="bottom-btn-wrap">
			<div class="btn-box-area">
				<a href="#" class="button gray" name="btnBack">이전</a>
				<a href="#" class="button red" name="btnNext">다음</a>
			</div>
		</div>
	</div>
</div>

<form name="sendForm" method="post">
	<input type="hidden" name="auth_token" value="<?=$site_check_key?>">
	<input type="hidden" name="plan_type" id="plan_type" />
	<input type="hidden" name="plan_title" id="plan_title" />
	<input type="hidden" name="sum_price" id="sum_price" />
	<input type="hidden" name="term_day" id="term_day" value="<?=$term_day?>" />
<?php
for($i=0;$i<count($arrMember);$i++) {
?>
	<input type="hidden" name="cal_age[]" value="<?=$arrMember[$i]["cal_age"]?>" />
<?php
}
?>
</form>

<form name="frmNext" method="post" action="step03.php">
	<input type="hidden" name="prevStepPage" value="step02" />
</form>

<link rel="stylesheet" type="text/css" href="/travel/meritz/m/css/modal.css?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/meritz/m/css/modal.css")?>" />
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
/*
	// Taps Script
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
*/

$(document).ready(function() {
	$('.tablinks[plan_type=<?=$plan_type?>]').trigger('click');
});

$(document).on('click','.tablinks',function() {
	let plan_type = $(this).attr('plan_type');
	let sum_price = $(this).attr('sum_price');
	let plan_title = $(this).attr('plan_title');

	$('#plan_type').val(plan_type);
	$('#sum_price').val(sum_price);
	$('#plan_title').val(plan_title);

	$('.tablinks').removeClass('active');
	$(this).addClass('active');

	$('.tabcontent').css('display','none');
	$('.tabcontent[plan_type='+plan_type+']').css('display','block');

	num_rolling();
});

var num_rolling = function() {
	$.each($('.counter_up_rolling') , function(key, value) { 

		var $this = $(this),
		countTo = $this.attr('data-count');
		$({ countNum: $this.text()}).animate(

			{countNum: countTo},
			{
				duration: 1000, // 애니메이션이 완료될때까지 걸리는 시간
				easing:'linear', // 애니메이션 효과 방식
				step: function() { // 움직임 각 스텝별로 실행될 함수
					$this.text(Math.floor(this.countNum).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					// Math.floor -> this.countNum의 값을 정수로 만들어준다
				},
				complete: function() { // 움직임이 멈춘 후 실행될 함수
					$this.text(this.countNum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
				}
			}
		);
	});
}

$(document).on('click','a[name=btnNext]',function() {
	$.ajax({
		type : "POST",
		url : "/travel/meritz/common/process_step02.php",
		data : $('form[name=sendForm]').serialize(),
		dataType:"json",
		success : function(data, status) {

			if (data.result=="true") {
				location.href="step03.php";
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
<script type="text/javascript">
    // ********************** 다음이전버튼 영역    
    $(window).scroll(function(){
        if($(document).scrollTop() >= $(document).height() - $(window).height() - $("#footer").outerHeight() ){
            $(".bottom-btn-wrap").css({
                "position" : 'fixed',
                "bottom" : $("#footer").outerHeight(),
                "left" : '5%',
                "right" : '5%',
                "width" : '90%',
                "padding-bottom" : '20px'
            });
        }else{
            $(".bottom-btn-wrap").removeAttr("style");
        }
    });
</script>

<?php
require_once $SYS_ROOT_DIR."/travel/meritz/m/modal/edit-info.php";
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>