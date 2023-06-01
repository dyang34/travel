<? $mNum = "3";  $sNum = "1"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/header.php";
require_once $SYS_ROOT_DIR."/travel/db/common/JsUtil.php";

if(empty($_SESSION['phone_check'])) {
	JsUtil::alertReplace("세션이 만료되었습니다. 휴대폰 인증을 진행해 주세요.", "./check.php");
	exit;
}

$sql = "SELECT b.*, date_format(from_unixtime(regdate), '%Y-%m-%d') as reg_date "
	." 			, (select nation_name from nation n where n.no = b.nation_no) as nation_txt "
	." 			, (select count(*) from hana_plan_member c where c.hana_plan_no = a.hana_plan_no) as cnt_member "
	." FROM hana_plan_member a "
	." LEFT JOIN hana_plan b "
	." ON a.hana_plan_no = b.no "
	." where b.member_no='".$member_no."' and hphone='".$_SESSION['phone_check']."' AND regdate >= UNIX_TIMESTAMP(date_format(DATE_ADD(DATE_ADD(NOW(), INTERVAL -1 YEAR), INTERVAL 1 day), '%Y-%m-%d'))"
	." order by b.no desc "
;

$arrData = array();
$result=mysql_query($sql, $conn);
while($row=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrData, $row);
}
?>
<div class="search-wrap">
	<h2>가입내역 조회</h2>
	<div class="box-area finish">
<?php
	$curDate = date("Y-m-d H");
	for($i=0;$i<count($arrData);$i++) {
?>
		<h3>여행자보험 가입 내역 (<?=count($arrData)-$i?>)</h3>
		<table class="table-deepGray">
			<colgroup>
				<col width="20%">
				<col width="30%">
				<col width="20%">
				<col width="*">
			</colgroup>
			<tbody>
				<tr>
					<th class="type01">신청일</th>
					<td><?=$arrData[$i]["reg_date"]?></td>
					<th class="type01">상태</th>
					<td>
<?php
	if ($arrData[$i]["plan_list_state"]=="1") {
		echo "<span style='color:blue;'>신청</span>";
	} else if ($arrData[$i]["plan_list_state"]=="6") {
		if($curDate >= $arrData[$i]["end_date"]." ".$arrData[$i]["end_hour"]) {
			echo "<span style='color:green;'>만기</span>";
		} else {
			echo "<span>정상</span>";
		}
	} else if ($arrData[$i]["plan_list_state"]=="3") {
		echo "<span style='color:red;'>취소</span>";
	} else {
		echo $plan_state_text_array[$arrData[$i]["plan_list_state"]];
	}
?>
					</td>
				</tr>
				<tr>
					<th class="type01">상품명</th>
					<td><?=$arrData[$i]["trip_type"]=="1"?"국내":"해외"?>여행실손의료보험 - <?=$arr_plan_type_text[$arrData[$i]["plan_type"]]?></td>
					<th class="type01">피보험자/계약자</th>
					<td><?=$arrData[$i]["join_name"]?></td>
				</tr>
				<tr>
					<th class="type01">출발 일시</th>
					<td><?=$arrData[$i]["start_date"]." ".$arrData[$i]["start_hour"]?>시</td>
					<th class="type01">도착 일시</th>
					<td><?=$arrData[$i]["end_date"]." ".$arrData[$i]["end_hour"]?>시</td>
				</tr>
				<tr>
					<th class="type01">여행목적 (지역)</th>
					<td><?=$trip_purpose_array[$arrData[$i]["trip_purpose"]]?> (<?=$arrData[$i]["trip_type"]=="1"?"국내일원":$arrData[$i]["nation_txt"]?>)</td>
					<th class="type01">인원 (<?=$arrData[$i]["cnt_member"]?>명)</th>
					<td>
<?php
$sql="select * from hana_plan_member where hana_plan_no = ".$arrData[$i]["no"]." order by main_check desc, no asc ";
$result=mysql_query($sql, $conn);
while($row=mysql_fetch_array($result)) {
?>

					<p><?=$row["name"]?>(<?=trim(decode_pass($row['jumin_1'],$pass_key))?>) <?=number_format($row["plan_price"])?>원</p>
<?php
}
?>
					</td>
				</tr>
			</tbody>
		</table>
<?php
	}
?>
	</div>
	<div class="button-center-area">
		<a href="/" class="button red large">확인</a>
	</div>
</div>

<script>
  // Nav menu Active
	$( document ).ready( function() {
	  $( '.menu03' ).addClass( 'active' );
	});
</script>
<?php 
require_once $SYS_ROOT_DIR."/travel/db/include/footer.php";
?>