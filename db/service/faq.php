<? $mNum = "4"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/db/include/header.php";

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
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<div class="faq-wrap">
  <h2>FAQ</h2>
  <div class="box-search">
  	<div class="search">
  	<form name="searchForm" method="post">
	  <input type="text" class="searchint" name="_keyword" placeholder="검색어를 넣어주세요" value="<?=$_keyword?>">
	  <button type="submit" class="seachButton">
		<i class="icon-search"></i>
	  </button>
	</form>
	</div>
  	<div class="search-tag">
	  	<span class="span_keyword" style="cursor:pointer;">가입</span>
		<span class="span_keyword" style="cursor:pointer;">출발</span>
		<span class="span_keyword" style="cursor:pointer;">보상</span>
		<span class="span_keyword" style="cursor:pointer;">당일</span>
		<span class="span_keyword" style="cursor:pointer;">도난</span>
	</div>
  </div>
  
  <h3>자주하는 질문</h3>
  <div class="faq-cont">
	<ul id="accordion" class="accordion">
<?php
	for($i=0;$i<count($arrData);$i++) {
?>


	  <li>
		<div class="link">
		  <span class="title">Q</span>
		  <?=$arrData[$i]["title"]?>
		  <i class="fa fa-chevron-down"></i>
		</div>
		<div class="accd-cont">
		  <span class="title">A</span>
		  <div class="contArea"><?=fnFilterString_return(nl2br($arrData[$i]["content"]))?></div>
		</div>
	  </li>
<?php
}
?>	 
	</ul>
  </div>
</div>


<script>
  // FAQ Active        
  $(function() {
	var Accordion = function(el, multiple) {
	  this.el = el || {};
	  this.multiple = multiple || false;

	  // Variables privadas
	  var links = this.el.find('.link');
	  // Evento
	  links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
	  var $el = e.data.el;
		$this = $(this),
		$next = $this.next();

	  $next.slideToggle();
	  $this.parent().toggleClass('open');

	  if (!e.data.multiple) {
		$el.find('.accd-cont').not($next).slideUp().parent().removeClass('open');
	  };
	}	

	var accordion = new Accordion($('#accordion'), false);
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
require_once $SYS_ROOT_DIR."/travel/db/include/footer.php";
?>