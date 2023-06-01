<?php
$mNum = "1";
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";
?>
<div class="view-wrap">
	<h2 class="title">여행 라이프</h2>

	<!-- /** 보험라이프 제목 영역 -->
	<div class="subject-wrap">
		<h3>경암동 철길마을</h3>
		<p>2022.08.19</p>
	</div>
	<!-- 보험라이프 제목 영역 */ -->

	<!-- /** 보험라이프 view 영역 -->
	<div class="view-cont">		
		<!-- /** Swiper start -->
		<div class="swiper mySwiper2">
		<!-- /** Swiper Gallery Large start -->
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-03.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-02.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-04.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-05.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-06.jpg" />
				</div>
			</div>
			<!-- Swiper Gallery Large end **/ -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>

		<div thumbsSlider="" class="swiper mySwiper">
		<!-- /** Swiper Gallery Small start -->
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-03.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-02.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-04.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-05.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="../image/sub/photo-gallery-06.jpg" />
				</div>
			</div>
		<!-- Swiper Gallery Small end **/ -->
		</div>
		<!-- Swiper start **/ -->


		<p class="txt">
			경암동 철길마을은 1944년 전라북도 군산시 경암동에 준공하여 페이퍼 코리아 공장과 군산역을 연결하는 총 연장 2.5km 철로 주변의 마을을 총괄하여 붙인 이름이다. 마을이 위치한 행정 구역 명칭에 따라 철로 주변에 형성된 마을을 경암동 철길 마을이라 부르기 시작했다. 1944년 일제 강점기 개설된 철도 주변에 사람들이 모여 살기 시작하면서 동네를 이루었고 1970년대 들어 본격적으로 마을이 형성되었다. 경암동 철길은 일제 강점기인 1944년에 신문 용지 재료를 실어 나르기 위해 최초로 개설되었으며, 1950년대 중반까지는 “북선 제지 철도”로 불렸으며 1970년대 초까지는 “고려 제지 철도”, 그 이후에는 “세대 제지선” 혹은 “세풍 철도”로 불리다 세풍 그룹이 부도나면서 새로 인수한 업체 이름을 따서 현재는 “페이퍼 코리아선”으로 불리고 있다.
		</p>
		<p class="txt">
			<span class="tag">#경암동</span>
			<span class="tag">#철길마을</span>
			<span class="tag">#전라북도군산시</span>
			<span class="tag">#체험관광지</span>
			<span class="tag">#이색거리</span>
			<span class="tag">#철로</span>
			<span class="tag">#철도</span>
			<span class="tag">#기찻길</span>
			<span class="tag">#기차길</span>
		</p>

		<div class="nuri-wrap">
			<div class="text">
				본 저작물은 '한국관광공사'에서 '2020년'작성하여 공공누리 제1유형으로 개방한 '사진갤러리(경암동 철길마을)'을 이용하였으며, 해당 저작물은 '한국관광공사, kto.visitkorea.or.kr'에서 무료로 다운받으실 수 있습니다."
			</div>
			<div class="img">
				<img src="../image/sub/public-nuri.jpg">
			</div>
		</div>
		

		<div class="button-center">			
			<a href="#" class="button red">목록</a>
		</div>

		<div class="md-life">
			<h3>연관 라이프</h3>
			<div class="swiper-container swiper3">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<figure><img src="../image/sub/photo-gallery-01.jpg" alt=""></figure>
					</div>
					<div class="swiper-slide">
						<figure><img src="../image/sub/photo-gallery-02.jpg" alt=""></figure>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			
			<h3>추천 라이프</h3>
			<div class="swiper-container swiper4">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<figure><img src="../image/sub/photo-gallery-05.jpg" alt=""></figure>
					</div>
					<div class="swiper-slide">
						<figure><img src="../image/sub/photo-gallery-06.jpg" alt=""></figure>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>

	<div>
	</div>
	<!-- 보험라이프 view 영역 */ -->
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  // Swiper gallery loop
  var swiper = new Swiper(".mySwiper", {
	spaceBetween: 5,
	slidesPerView: 5,
	freeMode: true,
	watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
	loop: true,
	spaceBetween: 5,
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
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>