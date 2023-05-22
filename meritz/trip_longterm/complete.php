
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(완료)";

require_once $SYS_ROOT_DIR."/travel/meritz/include/header_trip.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";

$sql_check="select * from hana_plan a where member_no='".$member_no."' and session_key='".$check."'";
$result_check=mysql_query($sql_check);
$row_check=mysql_fetch_array($result_check);

if ($row_check['no']=='') {
	JsUtil::alertReplace("유효하지 않은 접근으로 차단되었습니다.","../index.php");
	exit;
}

$apply_no = getApplyNo($row_check["company_type"],$row_check["regdate"],$row_check["no"]);
?>
<script type="text/javascript">
	const apply_no = '<?=$apply_no?>';
</script>
	<div class="trip-finish">
		<div class="box-finish">
			<i class="icon-regi"></i>
			<h2>여행자 보험 가입이 완료되었습니다.</h2>
			<p>주말/공휴일 또는 근무시간 외 접수된 가입 건에 대한 가입증명서는 근무시작일에 일괄 발송됩니다.</p>

			<a href="../" class="button red">확인</a>
		</div>
	</div>
<?php
unset($_SESSION["travel_step"]);

require_once $SYS_ROOT_DIR."/travel/meritz/include/footer_trip.php";
?>