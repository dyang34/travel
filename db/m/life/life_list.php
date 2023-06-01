<?php
$mNum = "1";
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";
?>

<div class="sub-visual">
	<div class="title">
		<strong>라이프</strong>
		<p>알아두면 유용한 생활 정보</p>
	</div>
	<div class="sub-img"></div>
</div>

<div class="box-list-area first">
	<h2>여행 라이프</h2>

	<div class="button-center">			
		<a href="#" name="btnMoreTrip" pageNo="1" pageSize="5" contentType="1" class="button gray-line">더보기</a>
	</div>
</div>

<div class="box-list-area">
	<h2>보험 라이프</h2>

	<div class="button-center">			
		<a href="#" name="btnMoreTrip" pageNo="1" pageSize="5" contentType="2" class="button gray-line">더보기</a>
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

			objUpperDiv.before(data);
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
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>