<? $mNum = "3";  $sNum = "1"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/header.php";
?>
<script type="text/javascript">
	var oneDepth = 3; //1차 카테고리

	function check_form() {

		var frm=document.send_form;

		if(frm.phone1.value=='') {
			alert('휴대폰 번호를 정확하게 입력해 주세요.');
			frm.phone1.focus();
			return false;
		}

		if(frm.phone2.value=='') {
			alert('휴대폰 번호를 정확하게 입력해 주세요.');
			frm.phone2.focus();
			return false;
		}

		if(frm.phone3.value=='') {
			alert('휴대폰 번호를 정확하게 입력해 주세요.');
			frm.phone3.focus();
			return false;
		}

		$("#loading_area").css({"display":"block"});

		$.ajax({
			type : "POST",
			url : "../common/plan_hp_check.php",
			data :  $("#send_form").serialize(),
			success : function(data, status) {
				var json = eval("(" + data + ")");

				if (json.result=="true") {
					alert('인증번호를 입력해 주세요.'); 
					$("#loading_area").css({"display":"none"});
					$("#r_hp").css({"display":"block"});
					var time = 180; //3분 설정
					var min = "";
					var sec = "";
					var x = setInterval(function() {
						min = parseInt(time/60); 
						sec = time%60; 
						document.getElementById("demo").innerHTML = min + "분" + sec + "초";
						time--;

						if (time < 0) {
							clearInterval(x); //setInterval() 실행을 끝냄
							document.getElementById("demo").innerHTML = "시간초과";
							alert('3분이 초과 되었습니다. 처음부터 다시 진행해 주세요'); 
							$("#r_hp").css({"display":"none"});
						}
					}, 1000);

					return false;
				} else {
					alert('일치하는 정보가 없습니다'); 
//					 console.log('aaaaaaaaaaaaaa');
					return false;
				}
				
			},
			error : function(err)
			{
				alert(err.responseText);
				$("#loading_area").css({"display":"none"});
				return false;
			}
		});
	}

	function check_phone (){
		
		$("#loading_area").css({"display":"block"});
		$.ajax({
			type : "POST",
			url : "../common/plan_hp_confirm.php",
			data :  $("#send_form").serialize(),
			success : function(data, status) {
				var json = eval("(" + data + ")");
				if (json.result=="true") {
//					alert('인증되었습니다.'); 
					location.href="confirmation.php";
					$("#loading_area").css({"display":"none"});
					return false;
				} else {
					alert('인증번호가 일치하지 않습니다.'); 
					$("#loading_area").css({"display":"none"});
					return false;
				}
				
			},
			error : function(err)
			{
				alert(err.responseText);
				$("#loading_area").css({"display":"none"});
				return false;
			}
		});

	}
</script>

<div class="search-wrap">
  <h2>가입내역 조회</h2>
<form name="send_form" id="send_form">
  <div class="box-area">
	<h3>인증받으실 휴대폰 번호를 입력해주세요.</h3>
	<div class="ph-search">
		<ul class="inb">
			<li>
				<input type="tel" class="input01" name="phone1" id="phone1"  maxlength='4'>
			</li>
			<li class="dash">-</li>
			<li>
				<input type="tel" class="input01" name="phone2" id="phone2"  maxlength='4'>
			</li>
			<li class="dash">-</li>
			<li>
				<input type="tel" class="input01" name="phone3" id="phone3"  maxlength='4'>
			</li>
		</ul>
		<div class="button-center">
			<a href="javascript:void(0);" onclick="check_form();" class="button red">인증번호 받기</a>
		</div>
	</div>

	<div class="numberhidden" id="r_hp" style="display:none">
	<h3>수신받은 인증번호를 3분 이내로 입력해주세요.</h3>
	<ul class="number inb">
		<li>
			<input type="tel" name="phone_c" id="phone_c" class="input01" placeholder="인증번호" maxlength='6'>
		</li>
		<li>
			<a  href="javascript:void(0);" onclick="check_phone();" class="button red">인증완료</a>
		</li>
	</ul>
	</div>
  </div>
</form>

<!--
  <div class="button-center-area">
	<a href="search-finish.php" class="button red large">조회하기</a>
  </div>
</div>
-->
<?/*
<script>
  // Nav menu Active
	$( document ).ready( function() {
	  $( '.menu03' ).addClass( 'active' );
	});
</script>
*/?>
<?php 
require_once $SYS_ROOT_DIR."/travel/db/include/footer.php";
?>