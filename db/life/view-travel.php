<? $mNum = "1";  $sNum = "2"; ?>
<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/header.php";
?>
<link rel="stylesheet" type="text/css" href="https://ulife.co.kr/css/adm-view.css?v=<?=time()?>">
<?php 
$sql = "select * from free where no=$no";
$result=mysql_query($sql, $conn_ulife);
$row=mysql_fetch_array($result);
$regdate = substr($row[regdate], 0, 10);

$sql = "select no, file_name from free where no!=$no and content_type=$row[content_type] limit 1";
$result=mysql_query($sql, $conn_ulife);
$row_y=mysql_fetch_array($result);

$sql = "select no, file_name from free where no!=$no and content_type!= $row[content_type] limit 1";

$result=mysql_query($sql, $conn_ulife);
$row_r=mysql_fetch_array($result);
?>


<!-- /** Contents start -->    
<div class="life-view">
  <h2 class="title">여행 라이프</h2>
  <div class="view-wrap">
	<div class="titleArea">
	  <strong class="title"><?=$row[title]?></strong>
	  <span class="year-mth-day"><?=$regdate?></span>
	</div>
<!--
	<div class="galleryArea">
 /** Swiper start --
	  <div class="swiper mySwiper2">
			<img src="http://ulife.co.kr/board/free/photo/<?=$row[file_name]?>?v=<?=time()?>" />
		<!-- /** Swiper Gallery Large start 
		<div class="swiper-wrapper">
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-03.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-02.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-04.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-05.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-06.jpg" />
		  </div>
		</div>
		<!-- Swiper Gallery Large end **/ 
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	  </div>
-->
<!--
	  <div thumbsSlider="" class="swiper mySwiper">
		<!-- /** Swiper Gallery Small start --
		<div class="swiper-wrapper">
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-03.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-02.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-04.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-05.jpg" />
		  </div>
		  <div class="swiper-slide">
			<img src="/travel/db/image/sub/photo-gallery-06.jpg" />
		  </div>
		</div>
		<!-- Swiper Gallery Small end **/ --
	  </div>
	  <!-- Swiper start **/ 
	</div>
-->
	<div class="contArea">
		<div class="adm-view-comm">
<?

	if ($row[text_type]=="2") {
		echo fnFilterString_return(stripslashes(nl2br($row[content])));
	} else {
		echo fnFilterString_return(stripslashes($row[content]));
	}	
?>
			
		</div>

	  <!-- /** 태그 start --
	  <div class="tagArea">
		<span>#경암동</span>
		<span>#철길마을</span>
		<span>#전라북도군산시</span>
		<span>#체험관광지</span>
		<span>#이색거리</span>
		<span>#철로</span>
		<span>#철도</span>
		<span>#기찻길</span>
		<span>#기차길</span>
	  </div>
	</div>
	<!-- 태그 end **/ -->

	<!-- /** 공공누리 start --
	<div class="visitkorea">
	  <ul>
		<li>
		  본 저작물은 '한국관광공사'에서 '2020년'작성하여 공공누리 제1유형으로 개방한 '사진갤러리(경암동 철길마을)'을 이용하였으며, 해당 저작물은 '한국관광공사, kto.visitkorea.or.kr'에서 무료로 다운받으실 수 있습니다."
		</li>
		<li>
		  <img src="/travel/db/image/sub/public-nuri.jpg" alt="공공누리마크 공공저작물 자유이용허락">
		</li>
	  </ul>
	</div>
	<!-- 공공누리 end **/ -->
  </div>

  <div class="button-center-area">
	<a href="life-list.php" class="button red large">목록</a>
  </div>

  <div class="md-life">
	<ul class="clearfix inb">
	  <li>
		<h2>연관 라이프</h2>
		<div class="swiper-container swiper3">
		  <div class="swiper-wrapper">
			  <div class="swiper-slide">
				<figure onclick="location.href='view-travel.php?no=<?=$row_y[no]?>'" style="cursor:pointer"><img src="http://ulife.co.kr/board/free/photo480/<?=$row_y[file_name]?>?v=<?=time()?>" alt=""></figure>
			  </div>
			  <div class="swiper-slide">
				<figure><img src="/travel/db/image/sub/photo-gallery-02.jpg" alt=""></figure>
			  </div>
		  </div>
		  <div class="swiper-pagination"></div>
		</div>
	  </li>
	  <li>
		<h2>추천 라이프</h2>
		<div class="swiper-container swiper4">
		  <div class="swiper-wrapper">
			<div class="swiper-slide">
				<figure onclick="location.href='view-travel.php?no=<?=$row_r[no]?>'" style="cursor:pointer"><img src="http://ulife.co.kr/board/free/photo480/<?=$row_r[file_name]?>?v=<?=time()?>" alt=""></figure>
			</div>
			<div class="swiper-slide">
			  <figure><img src="/travel/db/image/sub/photo-gallery-06.jpg" alt=""></figure>
			</div>
		  </div>

		  <div class="swiper-pagination"></div>
		</div>
	  </li>
	</ul>
  </div>

</div>
<!-- Contents end **/ -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  // Nav menu Active
	$( document ).ready( function() {
	  $( '.menu01' ).addClass( 'active' );
	});


  // Swiper gallery loop
  var swiper = new Swiper(".mySwiper", {
	spaceBetween: 10,
	slidesPerView: 5,
	freeMode: true,
	watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
	loop: true,
	spaceBetween: 10,
	navigation: {
	  nextEl: ".swiper-button-next",
	  prevEl: ".swiper-button-prev",
	},
	thumbs: {
	  swiper: swiper,
	},
  });

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
require_once $SYS_ROOT_DIR."/travel/db/include/footer.php";
?>