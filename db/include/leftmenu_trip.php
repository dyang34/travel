
<div class="left-menu">
	<ul>
<?php
if ($pageStepNo < 1) {
?>
		<li class="on">
			<strong>1.</strong>여행정보
		</li>
<?php
} else {
?>
		<li class="active">
			<div class="<?=$pageStepNo==1?"on":""?>"><strong>1.</strong>여행정보</div>
			<a href="./step0101.php" class="button xsmall modify">수정</a>
			<div class="info-box">
				<ul>
					<li class="type-dot">여행지 : <?=$_SESSION["travel_step"]["1"]["nation_search"]?></li>
					<li class="type-dot">여행 목적 : <?=$trip_purpose_array[$_SESSION["travel_step"]["1"]["trip_purpose"]]?></li>
					<li class="purpose"><?=$_SESSION["travel_step"]["1"]["start_date"]?> ~ <?=$_SESSION["travel_step"]["1"]["end_date"]?></li>
<?php
		if ($pageStepNo > 1) {
?>
					<li class="type-dot">가입 인원 : <?=count($_SESSION["travel_step"]["1"]["member"])?>명</li>
<?php
		}
?>
				</ul>
			</div>
		</li>
<?php	
}

if ($pageStepNo <= 2 ) {
?>
		<li class="<?=$pageStepNo==2?"on":""?>">
			<strong>2.</strong>보험료 계산결과
		</li>
<?php
} else {
?>
		<li class="active">
			<strong>2.</strong>보험료 계산결과 
			<a href="./step02.php" class="button xsmall modify">수정</a>
			<div class="info-box">
				<ul>
					<li class="type-dot"><?=number_format($_SESSION["travel_step"]["2"]["sum_price"])?>원 (<?=$_SESSION["travel_step"]["2"]["plan_title"]?>)</li>
				</ul>
			</div>
		</li>
<?php
}

if ($pageStepNo <= 3) {
?>
		<li class="<?=$pageStepNo==3?"on":""?>">
			<strong>3.</strong>피보험자/계약자 정보
		</li>
<?php
} else {
?>
		<li class="active">
			<strong>3.</strong>피보험자/계약자 정보
			<a href="./step03.php" class="button xsmall modify">수정</a>
		</li>
<?php
}

if ($pageStepNo <= 4) {
?>

		<li class="<?=$pageStepNo==4?"on":""?>">
			<strong>4.</strong>가입 동의
		</li>
<?php
} else {
?>
		<li class="active">
			<strong>4.</strong>가입 동의
			<a href="./step04.php" class="button xsmall modify">수정</a>
		</li>
<?php
}
?>
		<li class="<?=$pageStepNo==5?"on":""?>">
			<strong>5.</strong>보험료 결제
		</li>
	</ul>
	<div class="customer-wrap">
		<ul>
			<li>
<?php
          if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/logo_meritz.png")) {
?>
            <img src="/img/logo_meritz.png" alt="로고">
<?php
          } else {
?>
            <img src="/travel/db/image/common/logo-meritz-row.png" alt="DB손보(주) 로고">
<?php
          }
?>				
				<span></span>
				<img src="/travel/db/image/common/logo-direct_left.png?t" alt="U 다이렉트 로고">
			</li>
			<li class="text">유다이렉트 고객센터</li>
			<li class="tel">1800-9010</li>
		</ul>
	</div>
</div>