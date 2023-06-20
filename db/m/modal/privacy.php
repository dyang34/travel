<!-- /** 개인정보수집 및 이용 Start -->
<div id="privacy">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>개인정보수집 및 이용</h2> 
      <div class="content">
        <ul>
          <li>
            <strong>㈜비아이에스 귀중</strong>
          </li>
          <li>
          본인은 ㈜비아이에스 보험토탈케어서비스를 통해 유라이프커뮤니케이션즈가 체결한 회원가입을 위하여 본인의 개인정보를 수집/이용하는 것에 동의합니다.
          </li>
          <li class="type_dash">
            - 수집하는 개인정보 항목 : (회원가입) 성명, 생년월일 / (보험료 산출) 성별, 출발일, 귀국일
          </li>
          <li class="type_dash">
            - 개인정보 수집/제공 목적 : ㈜비아이에스 보험토탈케어서비스 회원가입
          </li>
          <li class="type_dash">
            - 개인정보 보유 및 이용 기간 : <span class="accent">회원 탈퇴 시까지</span> 동의 거부 시 서비스 이용이 불가합니다.
          </li>
        </ul>
      </div>
      
	  <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 개인정보수집 및 이용 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-priv").click(function(){
    //$("#modal-04").css("display","block");
		
	$("#privacy").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-04").css("display","none");

	$("#privacy").fadeOut(200, function() {
	});
	return false;
  });
</script>