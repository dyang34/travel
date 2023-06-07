<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(1-1단계)";

require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";
?>
<div class="trip-wrap">
	<h2>여행자보험 가입</h2>

	<!-- /** 제목영역 -->
	<div class="title-wrap clearfix">
		<h3>1. 여행정보</h3>
	</div>
	<!-- 제목영역 */ -->

	<form name="sendForm" method="post">
	<input type="hidden" name="auth_token" value="<?=$site_check_key?>">
	<div class="signUp-wrap">
		<h3 class="title">여행 정보를 입력해 주세요.</h3>

		<ul class="stage-01 clearfix inb">
			<li class="first">
				<strong>여행종류</strong>

				<div class="cho-chk">
					<span>해외</span>
				</div>

				<span class="choiceChk first" style="display:none;">
					<input type="radio" id="trvTypeChk1" name="trip_type" value="2" <?=$_SESSION["travel_step"]["1"]["trip_type"]!="1"?"checked='checked'":""?>>
					<label for="trvTypeChk1">해외</label>
				</span>
				<span class="choiceChk second" style="display:none;">
					<input type="radio" id="trvTypeChk2" name="trip_type" value="1" <?=$_SESSION["travel_step"]["1"]["trip_type"]=="1"?"checked='checked'":""?>>
					<label for="trvTypeChk2">국내</label>
				</span>
			</li>
<?/*			
			<li class="second">
				<strong>가입유형</strong>

				<span class="choiceChk first">
					<input type="radio" id="indivChkAway" name="trip_group_type" value="1" <?=$_SESSION["travel_step"]["1"]["trip_group_type"]!="2"?"checked='checked'":""?>>
					<label for="indivChkAway">개인</label>
				</span>
				<span class="choiceChk second">
					<input type="radio" id="groupChkAway" name="trip_group_type" value="2" <?=$_SESSION["travel_step"]["1"]["trip_group_type"]=="2"?"checked='checked'":""?>>
					<label for="groupChkAway">단체</label>
				</span>
			</li>
*/?>			
			<li>
				<p class="type-dash">
					1. 여러국가를 여행하셔도 보장되오니, 여러국가를 여행하실 경우에는 가장 오래 체류할 국가를 선택해주시면 됩니다. 단, 여행 예정인 국가 중 보험인수 제한 국가가 포함되어 있을 경우 보험 가입이 불가능 합니다. 
					( <a id="btn-restr" class="alink"><b>여행금지국가</b> 확인</a> )
				</p>
				<span class="capt">※ 여행 중 해당 국가에 여행금지 구역 방문하는 경우 보상이 되지 않을 수 있습니다.</span>
				<p class="type-dash">2. 이중국적자, 외국인의 경우 모국으로 여행은 가입 불가합니다.</p>
				<p class="type-dash">3. 가입 시점의 현재 체류지가 국내인 경우에만 가입이 가능합니다.</p>
			</li>

			<li>
				<strong>여행국가</strong>
<?php
	if ($_SESSION["travel_step"]["1"]["trip_type"]=="1") {
?>
		<input type="text"  class="input01" value="국내일원" name="nation_search" id="nation_search" value="<?=$_SESSION["travel_step"]["1"]["nation_search"]?>" readonly>
		<input type="hidden" value="국내" name="nation" >
<?php
	} else {
?>
		<input type="text"  class="input01" name="nation_search" id="nation_search" value="<?=$_SESSION["travel_step"]["1"]["nation_search"]?>" placeholder="여행국가 명을 입력하세요.">
		<input type="hidden" name="nation" value="<?=$_SESSION["travel_step"]["1"]["nation"]?>">
<?php
	}
?>									
			</li>
			<li>
				<strong>여행목적</strong>
				<div class="select-box">
					<select name="trip_purpose">
						<option value="1" <?=$_SESSION["travel_step"]["1"]["trip_purpose"]=="1"?"selected='selected'":""?>>여행/관광</option>
						<option value="2" <?=$_SESSION["travel_step"]["1"]["trip_purpose"]=="2"?"selected='selected'":""?>>연수/출장</option>
					</select>
				</div>
			</li>
		</ul>
		<ul class="stage-01 sec-col clearfix inb">
			<li>
				<strong>출발일 (출국일)</strong>
				<div class="date_picker">
					<input type="text" class="input" name="start_date" id="start_date" value="<?=$_SESSION["travel_step"]["1"]["start_date"]?>" readonly>
				</div>
				<input type="hidden" name="start_hour" value="00" />
			</li>
			<li>
				<strong>출발시각</strong>
				<div class="select-box hour">
					<select name="start_hour" id="start_hour">
					<? for ($i=0;$i<24;$i++) { 
						$i_hour = sprintf("%02d", $i);
					?>
							<option value="<?=$i_hour?>" <?=$_SESSION["travel_step"]["1"]["start_hour"]==$i_hour?"selected='selected'":""?>><?=$i_hour?> 시</option>
						<? } ?>
					</select>
				</div>
			</li>
			
			<li>
				<strong>도착일 (입국일)</strong>
				<div class="date_picker">
					<input type="text" class="input" name="end_date" id="end_date" value="<?=$_SESSION["travel_step"]["1"]["end_date"]?>" readonly>
				</div>
				<input type="hidden" name="end_hour" value="24" />
			</li>
			<li>
				<strong>도착시각</strong>
				<div class="select-box hour">
					<select name="end_hour" id="end_hour">
						<? for ($i=1;$i<25;$i++) {
							$i_hour = sprintf("%02d", $i);

							if($_SESSION["travel_step"]["1"]["end_hour"]) {
								$end_hour = $_SESSION["travel_step"]["1"]["end_hour"];
							} else {
								$end_hour = 24;
							}
						?>
							<option value="<?=$i_hour?>" <?=$i_hour==$end_hour?"selected='selected'":""?>><?=$i_hour?> 시</option>
						<? } ?>
					</select>
				</div>
			</li>
		</ul>


		<div class="button-center">
			<a href="#" class="button point" name="btnNext">다음</a>
		</div>

		<div class="know-wrap">
			<!--div class="cont">
				<strong>가입전 알아두실 사항</strong>
				<p class="type-dash">1. 해외 여행자 보험 상품은 출국직전까지 가입 가능합니다.</p>
				<p class="type-dash">2. 가입확인서는 카카오톡 또는 문자 메세지로 보내 드립니다.</p>
				<p class="type-dash">3. 궁금하신 사항은 유라이프 여행자보험 고객센터1800-9010(평일 09시~18시)로 연락바랍니다.</p>
				<p class="type-dash">4. 해외여행 중 현지에서 사고 발생 시 24시간 한국어 안내가 지원되는 메리츠화재 우리말서비스 82-2-360-2407로 연락주시면 도움 받으실 수 있습니다.</p>
			</div-->
			<div class="cont">
				<strong>알아두실 사항</strong>
				<ul>
					<li><strong>보험취급자</strong></li>
					<li class="type-dash">- 본 보험의 모집인은 보험대리점 비아이에스㈜ 입니다.</li>

					<li><strong>단체보험 계약</strong></li>
					<li class="type-dash">- 본 보험계약은 유라이프파이낸셜㈜를 계약자, 유라이프파이낸셜㈜ 회원 중 가입 고객을 피보험자, 유라이프파이낸셜㈜ 회원 중 가입 고객 및 법정상속인을 보험수익자로 하는 단체계약입니다.</li>
					<li class="type-dash">- 본 보험계약은 단체형으로 운영하여 청약철회 및 품질보증해지 대상이 아닙니다.</li>

					<li><strong>만기환급금</strong></li>
					<li class="">본 상품은 순수보장성 상품으로 만기시 만기환급금이 없으며 또한 보험계약대출제도가 없습니다.</li>

					<li><strong>예금자보호 안내</strong></li>
					<li class="">이 보험계약은 예금자보호법에 따라, 예금보험공사가 보호하되, 보호 한도는 본 보험회사에 있는 귀하의 모든 예금보호 대상 금융상품의 해약환급금(또는 만기 시 보험금이나 사고보험금)에 기타 지급금을 합하여 1인당 "최고 5천만원"이며, 5천만원을 초과하는 나머지 금액은 보호하지 않습니다. 다만, 보험계약자 및 보험료 납부자가 법인인 보험계약은 예금자보호법에 따라 예금보험공사가 보호하지 않습니다.</li>

					<li><strong>보험계약을 할 때</strong></li>
					<li class="">보험계약시에는 보험상품명, 보험기간, 보험료, 보험료납입기간, 피보험자 등을 반드시 확인하시고, 자세한 상품내용은 반드시 보험약관을 확인하시기 바랍니다.</li>

					<li><strong>가입자의 계약 전 알릴 의무</strong></li>
					<li class="">계약자 또는 피보험자는 보험계약 청약 시 청약서(질문서를 포함합니다)의 질문사항에 대하여 알고 있는 내용을 반드시 사실대로 알려야 합니다. 그렇지 않은 경우 보험금의 지급이 거절되거나 보험계약이 해지될 수 있습니다.</li>

					<li><strong>가입자의 계약 후 알릴 의무</strong></li>
					<li class="">계약자 또는 피보험자는 보험계약을 맺은 후 보험약관에 정한 계약 후 알릴 의무사항이 발생하였을 경우 지체 없이 회사에 알려야 합니다. 그렇지 않을 경우 보험금 지급이 거절될 수 있습니다.</li>

					<li><strong>해지환급금이 납입보험료보다 적거나 없는 이유</strong></li>
					<li class="">해지환급금이란 보험계약이 중도에 해지될 경우에 지급되는 금액을 말하는 것으로 보험은 은행의 저축과 달리 위험보장과 저축을 겸비한 제도로 계약자가 납입한 보험료 중 일부는 불의의 사고를 당한 다른 가입자에게 지급되는 보험금으로, 또 다른 일부는 보험회사 운영에 필요한 경비로 사용되므로 중도해지 시 지급되는 해지환급금은 납입한 보험료보다 적거나 없을 수도 있습니다.</li>

					<li><strong>계약해지 후 다른 보험 계약 시 유의사항</strong></li>
					<li class="">보험계약자가 기존에 체결했던 보험계약을 해지하고 다른 보험계약을 체결하면 보험인수가 거절되거나 보험료가 인상되거나 보장내용이 달라질 수 있습니다.</li>

					<li><strong>모집질서 확립 및 신고센터 안내</strong></li>
					<li class="type-dash">- 보험계약과 관련된 보험질서 문란행위는 보험업법에 의해 처벌받을 수 있습니다.</li>
					<li class="type-dash">- 금융감독원 보험 모집질서 위반행위 신고센터 : 전화 1332 / 인터넷 www.fss.or.kr</li>
					<li class="type-dash">- 사고접수, 보험처리 등 보험계약 관련 문의(DB손해보험) : 전화 1588-0100 / 인터넷 www.idbins.com</li>

					<li><strong>보험상담 및 분쟁의 해결에 관한 사항</strong></li>
					<li class="">가입하신 보험에 관하여 상담이 필요하거나 불만사항이 있을 때에는 DB손해보험</li>
					<li class="">(TEL : 1588-0100 / 인터넷 www.idbins.com)으로 연락 주시면 신속히 해결해 드리겠습니다. 또한, 저희 회사의 처리결과에 이의가 있으시면 금융감독원 민원상담전화 국번 없이 1332, 인터넷 www.fss.or.kr에 민원 또는 분쟁조정 등을 신청하실 수 있습니다.</li>

					<li><strong>금융감독원 보험 범죄 신고센터 안내</strong></li>
					<li class="type-dash">- 보험범죄는 형법 제347조(사기)에 의거 10년 이하의 징역이나 2천만원 이하의 벌금에 처해지며, 보험범죄를 교사한 경우에도 동일한 처벌을 받을 수 있습니다. 금융감독원 민원상담전화 국번 없이 1332, 인터넷 www.fss.or.kr</li>
				</ul>
			</div>
		</div>
	</div>
	</form>
</div>

<!-- 여행국가 초성 검색 View -->
<div class="search_win_css" id="search_window"  style="display:none;">
	<div class="br_color">
		<div class="dis_win_css">
			<ul class="slist" id="com_search_val"></ul>	
		</div>
		<div class="swin_close" id="swin_close"><button class="winclose" type="button"><span>닫기</span></button></div>
	</div>
</div>

<form name="frmNext" method="post" action="step0102.php">
	<input type="hidden" name="prevStepPage" value="step0101" />
</form>

<link rel="stylesheet" type="text/css" href="/travel/db/m/css/modal.css?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/m/css/modal.css")?>">

<script type="text/javascript" src="/travel/db/js/ValidCheck.js?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/js/ValidCheck.js")?>"></script>
<script type="text/javascript">

	var tripType="<?=$_SESSION["travel_step"]["1"]["trip_type"]!="1"?"2":"1"?>";

	$(document).on('change','input[name=trip_type]',function() {

		if($(this).val()=="1") {
			$('input[name=nation]').val('국내');
			$('input[name=nation_search]').val('국내일원');
			$('input[name=nation_search]').prop('readonly',true);
			$("#search_window").hide();	
			$("#com_search_val").empty();

			if($('#start_date').val()) {
				$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal($('#start_date').val(), '1'))) );
			}
		} else {
			$('input[name=nation]').val('');
			$('input[name=nation_search]').val('');
			$('input[name=nation_search]').prop('readonly',false);
			$('input[name=nation_search]').prop('placeholder','여행국가 명을 입력하세요.');

			if($('#start_date').val()) {
				$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal($('#start_date').val(), '3'))) );
			}
		}

		tripType = $(this).val();

		if(!check_hour_max()){
			$('#end_date').val('');
		}

		return false;

	});

	$(document).on('click','a[name=btnNext]',function() {

		var f = document.sendForm;

		if ( VC_inValidText(f.nation_search, "여행국가") ) return false;
		if(f.nation.value=="" && f.nation_search.value != "") {
			alert("여행국가를 입력 후 리스트에서 선택해 주세요.    ");
			f.nation_search.focus();
		}

		if ( VC_inValidText(f.start_date, "출발일") ) return false;
		if ( VC_inValidText(f.end_date, "도착일") ) return false;

		$.ajax({
			type : "POST",
			url : "/travel/db/common/process_step0101.php",
			data : $('form[name=sendForm]').serialize(),
			dataType:"json",
			success : function(data, status) {
				//var json = eval("(" + data + ")");		
				
				console.log(data.result);

				console.log(data);

				if (data.result=="true") {
					location.href="step0102.php";
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

	// 달력 script
	$(document).ready(function() {
		let today = new Date();
		let maxday = new Date();
		
		maxday.setMonth(maxday.getMonth()+6);
		maxday.setDate(maxday.getDate()-1);

		var tomorrow = new Date(Date.parse(today) + (1000 * 60 * 60 * 24));
	
		$("#start_date").datepicker({
			showOn: "both",
			dateFormat: "yy-mm-dd",
			buttonImage: "../image/sub/icon-calendar.svg?",
			buttonImageOnly: true,
			showOtherMonths: true,
			dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
			monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
			monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
			buttonText: "Select date",
			minDate: today,
			maxDate: maxday,
			onClose: function( selectedDate ) {  
				$("#end_date").val("");
				$("#end_date").datepicker("enable");
				$("#end_date").datepicker( "option", "minDate", new Date(Date.parse(selectedDate)) );
				
				if (tripType=='2') {
				//$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(selectedDate) + (1000 * 60 * 60 * 24 * 90)) );
					$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal(selectedDate, '3'))) );
				} else {
				//$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(selectedDate) + (1000 * 60 * 60 * 24 * 30)) );
				$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal(selectedDate, '1'))) );
				}
			}         
		});
	
		$(" #end_date").datepicker({
			showOn: "both",
			dateFormat: "yy-mm-dd",
			buttonImage: "../image/sub/icon-calendar.svg?",
			buttonImageOnly: true,
			showOtherMonths: true,
			dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
			monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
			monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
			buttonText: "Select date",
			minDate: today,
			onClose: function( selectedDate ) {  
				if(selectedDate!="") {
					var start = $('#start_date').datepicker('getDate');
					var end   = $('#end_date').datepicker('getDate');
					endDate= end.setDate(end.getDate() + 1);
					var days   = (endDate - start)/1000/60/60/24;
					$("#thai_day").val(days);
				}
			}
		});

		if($('#start_date').val()) {
			if($('input[name=trip_type]:checked').val()=="1") {
				$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal($('#start_date').val(), '1'))) );
			} else {
				$("#end_date").datepicker( "option", "maxDate", new Date(Date.parse(treemonthcal($('#start_date').val(), '3'))) );
			}
		}
	});

	$("#end_date").datepicker("disable");

	$("#start_hour,#end_hour, #end_date").change(function(){
		if(!check_hour_max()){
			$('#end_date').val('');
		}
	});
			
	function treemonthcal(kind, kind1){
		var start_date = kind;
		var data_arr = start_date.split('-');
		var hap_year;
		var hap_month;
		var gap_month;
		var enddate;
		var gap_day;

			hap_month = Number(data_arr[1]) + Number(kind1);
			//console.log(hap_month);
			if(hap_month > 12){
			//gap_month = hap_month - Number(data_arr[1]);
			gap_month = hap_month - 12;

			//console.log('차이: '+gap_month);
			hap_year = Number(data_arr[0]) + 1;
			} else {
			gap_month = hap_month;
			hap_year = Number(data_arr[0]);
			}

		// 2019-08-21 추가 분 -  월을 분리해서 사용하는 중에 10보다 작은 월에 0을 붙여야 한다. (안붙이면 오류)
			if(gap_month < 10){
			gap_month = "0"+gap_month;
			} 	

		var lastDay = ( new Date(hap_year, gap_month,'')).getDate().toString();

		if(data_arr[2] > lastDay){
			gap_day = lastDay;
		} else {
			gap_day = data_arr[2];
		}
		//console.log('종료 일자 : '+lastDay);
		enddate = hap_year+"-"+gap_month+"-"+gap_day;
		//console.log('종료일 : '+enddate);
		return enddate;
	}

	function check_hour_max(){
		var stdate = $('#start_date').val();
		var enddate = $('#end_date').val();

		var sthour = $('#start_hour').val();
		var edhour = $('#end_hour').val();
		
		var maxdate;	

		if(tripType == "2"){
			maxdate = treemonthcal(stdate, '3');
		} else {
			maxdate = treemonthcal(stdate, '1');
		}
		console.log(maxdate);
		if(!cutMaxTripday(stdate, enddate, maxdate, sthour, edhour, tripType)){
			if(tripType == "2"){
				alert('단기해외여행자보험은 최대 3개월까지 가입가능합니다. 3개월 이상 가입 신청 시 유학(장기체류)보험으로 신청해주세요.');
			} else {
				alert('단기국내여행자보험은 최대 1개월까지 가입가능합니다.');
			}
			return false;
		} else {
			return true;
		}
	}

	$("#nation_search").focusin(function(){
		if($('input[name=trip_type]:checked').val()=="2") {
			nation_search_fun();
		}
	});
	
	$("#nation_search").on("paste keyup ",function(){
		if($('input[name=trip_type]:checked').val()=="2") {
			nation_search_fun();
		}
	});
	
	$('#swin_close').on("click",function(){
		$("#search_window").hide();	
		$("#com_search_val").empty();
	});

	$(document).on("click",'.ttt',function(){
		var ncode;				
		var nname;
		ncode = $(this).attr('nation_no');
		nname = $(this).text();

		$('input[name=nation]').val(ncode);
		$('input[name=nation_search]').val(nname);
		$("#search_window").hide();	
		$("#com_search_val").empty();

		return false;
	});

	function nation_search_fun() {
	
		var chkn = $("#nation_search").val();
		if(chkn == ''){
			$("#search_window").hide();	
			$("#com_search_val").empty();
			return false;
		}			

		$.ajax({
			type : "POST",
			url : "/travel/db/common/nation_search.php",
			data :  $("#nation_search").serialize(),
			dataType:"json",
			success : function(data, status) {
				//var json = eval("(" + data + ")");		
				
//				console.log(data.result);
//				console.log(data);

				if (data.result=="true") {
					if(data.msg){ 
					$("#com_search_val").empty();
					var aaa = JSON.stringify(data.msg)
					var bbb="";
					var se_win_po;
					
					var ccc = JSON.parse(aaa);
	//				console.log(ccc);
					$.each(ccc,function(ind,itm){
						bbb+="<li nation_no='"+itm.nation_code+"' class='ttt' style='cursor:pointer'><a href='#none'>"+itm.nation_name+"</a></li>";
					});
					
	//				console.log(bbb);
					$("#com_search_val").append(bbb);
					//console.log("offset : "+$("#nation").offset()+" height : "+$("#nation").height() );
					var input_h = $("#nation_search").height();
					se_win_po = $("#nation_search").offset();
					var input_w = $("#nation_search").innerWidth();
					$('.br_color').css({width:(input_w)+'px'});
					$("#search_window").css({top: (se_win_po.top+ input_h) +'px', left:se_win_po.left + 'px' });
					$("#search_window").show();	

					return false;
					} else {
						$('input[name=nation]').val('');
						$("#search_window").hide();	
						$("#com_search_val").empty();
					}
				} else {
					$("#search_window").hide();	
					return false;
				}
				
			},
			error : function(err)
			{
				alert(err.responseText);
			
				return false;
			}
		}); // ajax end
	} //function end
</script>
<?php
require_once $SYS_ROOT_DIR."/travel/db/m/modal/restrict.php";
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>