<!-- /** 보험인수 제한 국가 안내 Start -->
<div id="modal-01">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>보험인수 제한 국가 안내</h2>
      <div class="content">
        <ul>
          <li>
            <strong>아시아</strong>
          </li>
          <li>
            아프가니스탄, 이스라엘, 이라크, 이란, 북한, 레바논, 파키스탄, 팔레스타인 자치구, 시리아, 타지키스탄, 예멘
          </li>

          <li>
            <strong>아프리카</strong>
          </li>
          <li>
            부르키나파소, 부룬디, 콩고(자이레), 중앙아프리카, 콩고, 코트디브와르, 알제리, 이집트, 기니, 리비아, 말리, 나이지리아, 수단, 시에라리온, 소말리아, 챠드, 자이레
          </li>

          <li>
            <strong>유럽</strong>
          </li>
          <li>
            우크라이나, 크림반도
          </li>

          <li>
            <strong>북아메리카</strong>
          </li>
          <li>
            쿠바, 니카라과
          </li>

          <li>
            <strong>남아메리카</strong>
          </li>
          <li>
            아이티, 베네수엘라
          </li>

          <li>
            <strong>기타</strong>
          </li>
          <li>
            남극
          </li>
		  
          <li>
            * 외교부의 여행금지대상 국가정보는 수시로 변경됩니다. 여행금지대상국가의 경우 가입이 불가하거나 또는 보상 대상에서 제외될 수 있습니다.
          </li>
          <li>
            <a href="http://www.0404.go.kr/dev/main.mofa" class="text-link" target="_blank" title="외교부 홈페이지 새창열림">외교부 해외안전여행 여행제한 및 금지구역 확인</a>
          </li>
        </ul>
      </div>

      <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 보험인수 제한 국가 안내 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-mod1").click(function(){
    //$("#modal-01").css("display","block");

	$("#modal-01").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-01").css("display","none");

	$("#modal-01").fadeOut(200, function() {
	});
	return false;
  });
</script>