<?php
$mNum = "1";
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/meritz/include/common.php";

$sql = "select * from free where no=$no";
$result=mysql_query($sql, $conn_ulife);
$row=mysql_fetch_array($result);
$regdate = substr($row[regdate], 0, 10);

$sql = "update free set hit=hit+1 where no=$no";
$result=mysql_query($sql, $conn_ulife);

$sql = "select no, title, file_name from free where no!=$no and secret='N' and content_type=$row[content_type] order by rand() limit 3";
$result=mysql_query($sql, $conn_ulife);
$arrRelation = array();
while($row_y=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrRelation, $row_y);
}

$sql = "select no, title, file_name from free where no!=$no and secret='N' and content_type!= $row[content_type] order by rand() limit 3";
$result=mysql_query($sql, $conn_ulife);
$arrRecommend = array();
while($row_r=mysql_fetch_array($result)) {
	//array_push($arrData, $row);
	array_push($arrRecommend, $row_r);
}

$__SITE_META_TITLE = stripslashes($row['meta_title']);
$__SITE_META_DESC = stripslashes($row['meta_desc']);

require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";
?>

<link rel="stylesheet" type="text/css" href="https://ulife.co.kr/css/adm-view.css?v=<?=time()?>">

<div class="view-wrap">
	<h2 class="title"><?=$row['content_type']=="2"?"보험":"여행"?> 라이프</h2>

	<!-- /** 보험라이프 제목 영역 -->
	<div class="subject-wrap">
		<h3><?=stripslashes($row[title])?></h3>
		<p><?=$regdate?></p>
	</div>
	<!-- 보험라이프 제목 영역 */ -->

	<!-- /** 보험라이프 view 영역 -->
	<div class="view-cont">
		<div class="adm-view-comm">
<?php
	if ($row[text_type]=="2") {
		echo fnFilterString_return(stripslashes(nl2br($row[content])));
	} else {
		echo fnFilterString_return(stripslashes($row[content]));
	}	
?>
		</div>

		<div class="button-center">			
			<a href="./life_list.php" class="button red">목록</a>
		</div>

		<div class="md-life">
			<h3>연관 라이프</h3>
			<div class="swiper-container swiper3">
				<div class="swiper-wrapper">
<?php
for($i=0;$i<count($arrRelation);$i++) {
?>
					<div class="swiper-slide">
						<figure onclick="location.href='life_view.php?no=<?=$arrRelation[$i]['no']?>'"><img src="http://ulife.co.kr/board/free/photo480/<?=$arrRelation[$i]['file_name']?>?v=<?=time()?>" alt=""></figure>
						<div class="text-area-slide">
							<?=stripslashes($arrRelation[$i]['title'])?>
						</div>
					</div>
<?php
}
?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			
			<h3>추천 라이프</h3>
			<div class="swiper-container swiper4">
				<div class="swiper-wrapper">
<?php
for($i=0;$i<count($arrRecommend);$i++) {
?>
					<div class="swiper-slide">
						<figure onclick="location.href='life_view.php?no=<?=$arrRecommend[$i]['no']?>'"><img src="http://ulife.co.kr/board/free/photo480/<?=$arrRecommend[$i]['file_name']?>?v=<?=time()?>" alt=""></figure>
						<div class="text-area-slide">
							<?=stripslashes($arrRecommend[$i]['title'])?>
						</div>
					</div>
<?php
}
?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

	</div>

	<!-- 보험라이프 view 영역 */ -->
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>

  // swiper3
  new Swiper('.swiper3', {
	loop : true, // 무한 루프 슬라이드, 반복이 되며 슬라이드가 끝이 없다.
	pagination : { // 페이징 설정
	  el : '.swiper-pagination',
	  clickable : true, // 페이징을 클릭하면 해당 영역으로 이동, 필요시 지정해 줘야 기능 작동
	},
  });

  // swiper4
  new Swiper('.swiper4', {
	loop : true, // 무한 루프 슬라이드, 반복이 되며 슬라이드가 끝이 없다.
	pagination : {
	  el : '.swiper-pagination',
	},
  });
</script>
<?php
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>