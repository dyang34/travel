<?$mNum = "0"; ?>
<?
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/header.php";

$sql = "select * from free order by no desc limit 3";
$result=mysql_query($sql, $conn_ulife);
?>
    <!-- /** Swiper start -->
    <div class="swiper mySwiper">
		<div class="swiper-wrapper">
			<!-- *** Slide 1 start -->
			<div class="swiper-slide visual1">
				<div class="title">
					<strong>여행자보험과 함께라면</strong>
					<strong>마음 편히 언제라도</strong>
					<strong>어디든 떠날 수 있어요!</strong>
				</div>
			</div>
			<!-- *** Slide 1 end -->

			<!-- *** Slide 2 start -->
			<div class="swiper-slide visual2">
				<div class="title">
					<strong>나도, 아이도, 부모님도</strong>
					<strong>우리 모두를 지키는</strong>
					<strong>해외여행 안심가드 여행자보험</strong>
				</div>
			</div>
			<!-- *** Slide 2 end -->

			<!-- *** Slide 3 start -->
			<div class="swiper-slide visual3">
				<div class="title">
					<strong>여행자보험</strong>
					<strong>이제 선택 아닌 필수</strong>
				</div>
			</div>
			<!-- *** Slide 3 end -->
		</div>
		<p class="caution">* ㈜유라이프파이낸셜 보험대리점(서비스: 유다이렉트)은 통신판매중개자로서, 아래상품은 해당 보험사의 책임하에 운영됩니다.</p>

		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
    </div>
    <!-- Swiper end **/ -->

	<section id="section01">
		<div class="logo-area"><img src="image/common/logo-meritz-col.png?v" alt=""></div>
		<div class="cont-list">
			<ul>
				<li class="img-area">
					<span>
						<img src="image/main/departures.png?v" alt="아이콘 이미지">
					</span>
				</li>
				<li class="text-area">
					<strong>출국 전 모바일 간편가입, 동반자 가입가능 공동인증서 없이 간편 가입 가능!</strong>
					<p>회원가입 필요없이 쉽고, 빠르게 보험에 가입!</p>
				</li>
				
				<li class="img-area">
					<span>
						<img src="image/main/travel-and-tourism.png?v" alt="아이콘 이미지">
					</span>
				</li>
				<li class="text-area">
					<strong>믿을 수 있는 여행자보험, 보장도 든든하게!</strong>
					<p class="type-dash">- 해외여행 중 발생한 진찰, 수술, 입원비 등 해외의료비 보장 (특약)</p>
					<p class="type-dash">- 도난이나 파손 등 우연한 사고로 인한 휴대품손해 보장(분실제외) (특약)</p>
					<p class="type-dash">- 항공기 지연/결항으로 인한 추가부담비용 보장 (특약)</p>
				</li>
				
				<li class="img-area">
					<span>
						<img src="image/main/customer-service.png?v" alt="아이콘 이미지">
					</span>
				</li>
				<li class="text-area">
					<strong>연중무휴 24시간 우리말도움 서비스제공</strong>
					<p>전문 상담사 24시간 대기 서비스</p>
				</li>
			</ul>
		</div>
		<div class="button-center">			
			<a href="trip/step0101.php" class="button red">보험료 계산/가입</a>
		</div>
	</section>

	<section id="section02">
		<h2>라이프</h2>
<?php
			while($row=mysql_fetch_array($result))
			{
			$content = htmlspecialchars_decode($row["content"]);
			$content = get_content_from_html($content, "cls_list_summary");
			$content=fnFilterString_return(strip_tags($content));
			$content = strip_tags($content); 
//			$content=substr($content, 0, 100);
      $title=$row[title];
//			$title=substr($row[title], 0, 50);
?>
		<div class="box-list">
			<a href="/travel/meritz/m/life/life_view.php?no=<?=$row[no]?>">
				<div class="box-mask"><img src="http://ulife.co.kr/board/free/photo480/<?=$row[file_name]?>?v=<?=time()?>" alt=""></div>
				<div class="title">
					<strong><?=$title?></strong>
					<p><?=$content?></p>
				</div>
			</a>
		</div>
<?}?>		
	</section>

	<section id="section03">
		<h2>반드시 확인하세요!</h2>
		<ul>
			<li class="type-number">1. 해외 여행자 보험 상품은 출국직전까지 가입가능합니다.</li>
			<li class="type-number">2. 가입확인서는 카카오톡 또는 문자메세지로 보내 드립니다.</li>
			<li class="type-number">3. 궁금하신 사항은 유다이렉트 고객센터 1800-9010 (평일 09시~18시) 로 연락바랍니다.</li>
			<li class="type-number">4. 해외여행 중 현지에서 사고 발생 시 24시간 한국어 안내가 지원되는 메리츠화재 고객콜센터 82-2-1566-7711 로 연락주시면 도움 받으실 수 있습니다.</li>
		</ul>
	</section>

	<section id="section04">
		<h2>※ 가입시 유의사항</h2>
		<ul>
			<li class="type-dot">계약 체결 전 자세한 내용은 상품설명서와 약관을 참조하시기 바랍니다.</li>
			<li class="type-dot">가입자의 계약 전 알릴 의무
				<ul class="type-inside">
					<li >계약자 또는 피보험자는 보험계약 청약 시 청약서(전자문서 포함)의 질문한 사항에 대하여 알고 있는 내용을 반드시 사실대로 알려야 하며(청약서 또는 전자청약서에 기재), 그렇지 않은 경우 보험금의 지급이 거절되거나 계약이 해지될 수 있습니다.</li>
				</ul>
			</li>			
			<li class="type-dot">보험계약자가 기존 보험계약을 해지하고 새로운 보험계약을 체결하는 경우, 보험인수가 거절되거나 보험료가 인상될 수 있으며, 보장내용(면책기간 재적용 등)이 달라질 수 있습니다.</li>
			<li class="type-dot">이 보험계약은 예금자보호법에 따라 예금보험공사가 보호하되, 보호 한도는 본 보험회사에 있는 귀하의 모든 예금보호대상 금융상품의 해약환급금(또는 만기시 보험금이나 사고보험금)에 기타지급금을 합하여 1인당 “최고 5천만원”이며, 5천만원을 초과하는 나머지 금액은 보호하지 않습니다. 다만, 보험계약자 및 보험료 납부자가 법인인 보험계약은 예금자보호법에 따라 예금보험공사가 보호하지 않습니다.</li>
			<li class="type-dot">지급한도, 면책사항 등에 따라 보험금 지급이 제한될 수 있습니다.</li>
			<li class="type-dot">보험금 지급 유의사항
				<ul class="type-inside">
					<li class="type-number">1. 피보험자/보험수익자/계약자의 고의로 인한 보험사고는 보장하지 않습니다.</li>
					<li class="type-number">2. 전쟁, 외국의 무력행사, 혁명, 내란, 사변, 폭동으로 인한 손해는 보장하지 않습니다.</li>
					<li class="type-number">3. 직업, 직무 또는 동호회 활동목적으로 아래에 열거된 행위를 하는 동안에 발생한 사고로 인한 의료비는 지급하지 않습니다.
						<ul>
							<li class="type-number">① 전문등반, 글라이더 조종, 스카이다이빙, 스쿠버다이빙, 수상보트, 행글 라이딩, 패러글라이딩</li>
							<li class="type-number">② 모터보트, 자동차 또는 오토바이에 의한 경기, 시범, 흥행 (연습 포함) 또는 시운전</li>
							<li class="type-number">③ 선박승무원, 어부, 사공, 그밖에 선박에 탑승하는 것을 직무로 하는 사람 이 직무상 선박에 탑승하여 얻은 사고</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="type-dot">본 계약은 보험계약자를 ㈜유라이프파이낸셜(서비스: 유다이렉트/이하 “㈜유라이프파이낸셜”)로 피보험자 및 보험수익자를 ㈜유라이프파이낸셜 회원으로 하는 단체(취급) 여행계약입니다.</li>
			<li class="type-dot">이에 유라이프 회원만 피보험자로 가입 가능하며 유라이프 회원이 아닌 경우 가입이 불가능합니다.</li>
			<li class="type-dot">청약철회
				<ul class="type-inside">
					<li class="type-dash">- 보험증권(보험가입증서)을 받은 날부터 15일 이내에조건없이 청약철회 가능(단, 청약일부터 최대 30일 이내 / 만 65세 이상은 45일 이내) 청약철회접수일부터 3일 이내 납입보험료전액 환급</li>
				</ul>
			</li>
			<li class="type-dot">품질보증해지
				<ul class="type-inside">
					<li>아래 3가지 중 1개라도 해당하는 경우 계약이 성립한 날부터 3개월 이내에 계약 취소 가능</li>
					<li class="type-number">① 약관 및 청약서를 받지 못한 경우</li>
					<li class="type-number">② 청약시 약관의 중요내용을 설명받지 못한 경우</li>
					<li class="type-number">③ 청약서에 자필서명(전자서명 포함)이 없는 경우, 납입보험료 전액과 정해진 이자를 환급
				</ul>
			</li>
			<li class="type-dot">㈜유라이프파이낸셜은 해당 상품에 대해 충분히 설명할 의무가 있으며, 가입자는 가입에 앞서 이에 대한 충분한 설명을 받으시기 바랍니다.</li>
			<li class="type-dot">해당모집종사자는 보험사로부터 보험계약체결권을 부여받지 아니한 금융상품판매대리·중개업자임을 알려드립니다.</li>
			
			<!-- /*** 2022.10.26 내용추가 -->
			<li class="type-dot">㈜유라이프파이낸셜은 다수의 보험사와 계약체결을 대리/중개하는 보험대리점입니다. 보험계약 체결권한은 유라이프대리점에게 있지 않고, 보험사에 있습니다.</li>
			<li class="type-dot">본 페이지의 내용은 광고심의기준을 준수하였으며, 유효기간은 심의일로부터 1년입니다.</li>
			<li class="type-dot">계약자 또는 피보험자 등은 보험계약 청약 시 과거의 건강 상태, 직업 등 청약서의 기재사항 및 질문사항에 대하여 알고 있는 내용을 반드시 사실대로 알려야 하며, 그렇지 않은 경우 보험금의 지급이 거절되거나 계약이 해지될 수 있습니다.</li>
			<li class="type-dot">이 계약에서 보장하는 위험과 같은 위험을 보장하는 다른 계약(공제계약 포함)이 있을 경우에는 비례보상이 적용됩니다.</li>

			<!-- /*** 2022.10.20 내용추가 -->
			<li class="type-dot">금융소비자보호법에 따른 고지			
				<ul class="type-inside">
					<li class="type-dash">- ㈜유라이프파이낸셜은 인터넷을 이용해 보험상품에 관한 계약체결을 대리,중개하는 금융상품판매대리,중개업자로서 보험회사(메리츠화재해상보험)과 보험모집 위탁계약을 체결하고 있습니다.</li>
					<li class="type-dash">- ㈜유라이프파이낸셜은 위 보험사들로부터 금융상품계약체결권을 부여받지 않은 경우 금융상품 계약을 체결할 권한이 없으며, 금융소비자보호법위반으로 금융소비자에게 손해를 발생시킨 경우 금융소비자보호법 제 44조 및 제45조에따라 그 손해를 배상할 책임이 있습니다.</li>
					<li class="type-dash">- ㈜유라이프파이낸셜은 보험사들로부터 금전수령에 관한 권한을 부여받은 경우를 제외하고는 금융소비자가 계약에 따라 지급해야 하는 금전을 수령할 권한이 없으며, 대리,중개시 보험사들로부터 직접판매업자로부터 정해진 수수료 외에 금품 그밖에 재산상 이익을 요구하거나 받을 수 없습니다.</li>
					<li class="type-dash">- 금융소비자가 제공하는 개인(신용)정보 등은 보험사들이 보유,관리하며, ㈜유라이프파이낸셜은 기타 금융소비자보호법에서 요구하는 금융소비자 보호 또는 건전한 질서유지를 위한 내용을 준수하고 있습니다.</li>
				</ul>
			</li>

			<li class="type-dot">대리점 등록번호: 2015090143</li>
			<li class="type-dot">준법감시인 심의필 제2022-광고-1566호(2022.11.04~2023.11.03)</li>
		</ul>
	</section>
	
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js?v=<?=time()?>"></script>

<script>
  // Initialize Swiper
  var swiper = new Swiper(".mySwiper", {
	slidesPerView: 1,
	spaceBetween: 0,
	loop: true,
	navigation: {
	  nextEl: ".swiper-button-next",
	  prevEl: ".swiper-button-prev",
	},
  });


    // ********************** 보험료 계산/가입 버튼
	 $(window).scroll(function(){
		if($(this).scrollTop() > 500){
			$(".button-center").css({
                "position" : 'relative',
                "padding-bottom" : '0px'
            });
		}else{
            $(".button-center").removeAttr("style");
		}
	})
</script>
<?php
require_once $SYS_ROOT_DIR."/travel/meritz/m/include/footer.php";
?>
