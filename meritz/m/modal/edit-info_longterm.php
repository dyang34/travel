<!-- /** 이용약관 Start -->
<div id="modal">
	<div class="modal-bg">
		<div class="modal-cont">
			<h2>입력정보 요약</h2>
			<div class="content">
				<ul>
<?php
	if ($pageStepNo > 0) {
?>
					<li>
						<h3>1. 여행정보
							<a href="/travel/meritz/m/trip_longterm/step0101.php" class="button small gray">수정</a>
						</h3>
						<p class="first">여행지 : <?=$_SESSION["travel_step"]["1"]["nation_search"]?></p>
						<p>여행 목적 : <?=$trip_purpose_array[$_SESSION["travel_step"]["1"]["trip_purpose"]]?></p>
						<p>여행 기간 : <?=$_SESSION["travel_step"]["1"]["start_date"]?> ~ <?=$_SESSION["travel_step"]["1"]["end_date"]?></p>
<?/*						
						<p>가입 유형 : <?=$_SESSION["travel_step"]["1"]["trip_group_type"]=="1"?"개인":"단체"?></p>
*/?>						
<?php
		if ($pageStepNo > 1) {

?>
						<p>가입 인원 : <?=count($_SESSION["travel_step"]["1"]["member"])?>명</p>
<?php
		}
?>
					</li>
<?php
		if ($pageStepNo > 2) {
?>
					<li>
						<h3>2. 보험료 계산 결과
							<a href="/travel/meritz/m/trip_longterm/step02.php" class="button small gray">수정</a>
						</h3>
						<p class="first"><?=number_format($_SESSION["travel_step"]["2"]["sum_price"])?>원 (<?=$_SESSION["travel_step"]["2"]["plan_title"]?>)</p>
					</li>
<?php
			if ($pageStepNo > 3) {
?>
					<li>
						<h3>3. 피보험자/계약자 정보
							<a href="/travel/meritz/m/trip_longterm/step03.php" class="button small gray">수정</a>
						</h3>
					</li>
<?php
				if ($pageStepNo > 4) {
?>
					<li>
						<h3>4. 가입 동의
							<a href="/travel/meritz/m/trip_longterm/step04.php" class="button small gray">수정</a>
						</h3>
					</li>
<?php
					if ($pageStepNo > 5) {
?>
					<li>
						<h3>5. 보험료 결제
							<a href="" class="button small gray">수정</a>
						</h3>
					</li>
<?php
					}
				}
			}
		}
	}
?>
				</ul>
			</div>
			<a href="#" class="close">&times;</a>
		</div>
	</div>
</div>
<!-- 이용약관 End **/ -->

<script>
	// Layer-Popup Active
	$("#btn-mod").click(function(){
		//$("#modal").css("display","block");
		
		$("#modal").fadeIn(200, function() {
		});

		return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
	});
	$(".close").click(function(){
		//$("#modal").css("display","none");

		$("#modal").fadeOut(200, function() {
		});

		return false;
	});
</script>