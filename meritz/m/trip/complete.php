<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

$__SITE_META_TITLE_FIX = "여행자보험 간편가입(완료)";

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/JsUtil.php";
require_once $SYS_ROOT_DIR."/travel/meritz/common/function_step.php";

$sql_check="select * from hana_plan a where member_no='".$member_no."' and session_key='".$check."'";
$result_check=mysql_query($sql_check);
$row_check=mysql_fetch_array($result_check);

if ($row_check['no']=='') {
	JsUtil::alertReplace("유효하지 않은 접근으로 차단되었습니다.","../index.php");
	exit;
}
?>
<div class="trip-wrap">

	<div class="signUp-wrap">

		<div class="step06">
			<i class="icon-finish"></i>
			<strong>가입 완료</strong>
			<p>여행자 보험 가입이 완료 되었습니다.</p>
		</div>

		<div class="button-center">
			<a href="../" class="button red">확인</a>
		</div>
	</div>
</div>
<?php

unset($_SESSION["travel_step"]);

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>