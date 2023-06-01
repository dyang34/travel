<? $mNum = "1";  $sNum = "1"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/header.php";
/*
$sql = "select no, file_name from free where secret='N' and content_type = 2 order by rand() limit 6";
$result=mysql_query($sql, $conn_ulife);
$arrInsurance = array();
while($row_y=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrInsurance, $row_y);
}

$sql = "select no, file_name from free where secret='N' and content_type = 1 order by rand() limit 3";
$result=mysql_query($sql, $conn_ulife);
$arrTrip = array();
while($row_r=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrTrip, $row_r);
}
*/
?>
<div class="topImg">
	<div class="title">
		<h2>라이프</h2>
		<p>알아두면 유용한 생활 정보</p>
	</div>
	<img src="/travel/db/image/sub/visual-01.png" alt="라이프 이미지">
</div>

<div class="travel-life">
	<h2>여행 라이프</h2>
	<ul class="box-list clearfix inb">
	</ul>
	<div class="button-center-area">
		<a href="#" name="btnMoreTrip" pageNo="1" pageSize="3" contentType="1" class="button bule-line large">더보기</a>
	</div>
</div>

<div class="insurance-life">
	<h2>보험 라이프</h2>
	<ul class="box-list clearfix inb">
	</ul>
	<div class="button-center-area">
		<a href="#" name="btnMoreTrip" pageNo="1" pageSize="6" contentType="2" class="button bule-line large">더보기</a>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("a[name=btnMoreTrip]").trigger("click");
});

$(document).on('click','a[name=btnMoreTrip]',function() {
	let obj = $(this);
	let objUpperDiv = obj.closest('div');

	$.ajax({
		type : "POST",
		url : "./list_cont_ajax.php",
		data : {p_content_type:obj.attr('contentType'), p_page_num:obj.attr('pageNo'), p_page_size:obj.attr('pageSize')},
		dataType:"html",
		success : function(data, status) {

			$('input[name=hdnMoreCont]').remove();

			objUpperDiv.prev().append(data);
			obj.attr('pageNo', Number(obj.attr('pageNo'))+1);
			
			if($('input[name=hdnMoreCont]').val()=="N") {
				objUpperDiv.remove();
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
require_once $SYS_ROOT_DIR."/travel/db/include/footer.php";
?>