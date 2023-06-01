<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";

$_keyword = $_REQUEST["_keyword"];

$select="select * from faq where secret != 'Y' ";
$where = "";
if(!empty($_keyword)) { 
	$where =" and (title like '%".$_keyword."%' or content like '%".$_keyword."%')";
}
$orderby = "order by no desc";

$sql = $select.$where.$orderby;

$arrData = array();
$result=mysql_query($sql, $conn_ulife);
while($row=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrData, $row);
}
?>
<div class="faq-wrap">
	<h2>FAQ</h2>

	<form name="searchForm" method="post">
	<div class="search-form">
		<div class="search">
			<input type="text" class="searchTerm" placeholder="검색어를 넣어주세요." name="_keyword" value="<?=$_keyword?>">
			<button type="submit" class="searchButton">
				<i class="icon-search"></i>
			</button>
		</div>
	</div>
	</form>

	<div class="tag-wrap">
		<span class="span_keyword" style="cursor:pointer;">가입</span>
		<span class="span_keyword" style="cursor:pointer;">출발</span>
		<span class="span_keyword" style="cursor:pointer;">보상</span>
		<span class="span_keyword" style="cursor:pointer;">당일</span>
	</div>
	<h3>자주하는 질문</h3>
	<div class="faq-list">
<?php
	for($i=0;$i<count($arrData);$i++) {
?>
		<div class="dropdown">
			<div class="dropdown-top">
				<p>
					<span>Q.</span>
					<?=$arrData[$i]["title"]?>
					<i class="icon-down"></i>
				</p>
			</div>
			<div class="dropdown-btm">
				<div class="faq-cont">
					<span>A.</span>
					<div class="faq-A-cont">
						<?=fnFilterString_return(nl2br($arrData[$i]["content"]))?>
					</div>
				</div>
			</div>
		</div>
<?php
}
?>	 
	</div>
</div>

<script>
  // FAQ Active
  jQuery('document').ready(function($){
  $('.dropdown-top').click(function(){
    if ($(this).parent(".dropdown").hasClass("open")) {
      $(this).parent(".dropdown").removeClass("open");
      $(this).siblings(".dropdown-btm").slideUp(500);
    } else {
      $(".dropdown").removeClass("open");
      $(".dropdown .dropdown-btm").slideUp(500);
      $(this).parent(".dropdown").addClass("open");
      $(this).siblings(".dropdown-btm").slideDown(500);
    }
  })
});

$(document).ready(function() {
	$(document).on('click','.span_keyword',function() {
		$('input[name=_keyword]').val($(this).html());
		document.searchForm.submit()

		return false;
	});
});
</script>
<?php
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>