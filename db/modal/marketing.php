<!-- /** 마케팅 활용 동의 Start -->
<div id="marketing">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>마케팅 활용 동의</h2> 
      <div class="content">
        <ul>
          <li>
            마케팅 정보 수신 여부 및 마케팅을 위한 개인정보 수집이용을 거부하실 수 있으며, 거부 시에도 유라이프 서비스를 이용하실 수 있으나, 동의를 거부한 경우 각종 소식 및 이벤트 참여에 제한이 있을 수 있습니다.
          </li>
        </ul> 
		 
        <table class="table-red">
          <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="*">
          </colgroup>
          <thead>
            <tr>
              <th>개인정보 제공 제휴사</th>
              <th>이용목적</th>
              <th>제공하는 개인 정보</th>
              <th>이용기간</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>유라이프</td>
              <td>유라이프 서비스 및 이벤트 안내</td>
              <td>성명, 생년월일, 성별, 이메일 주소</td>
              <td>3년</td>
            </tr>
        </table>
      </div>
      
	  <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 마케팅 활용 동의 End **/ -->


<script>
  // Layer-Popup Active
  $("#btn-mark").click(function(){
    //$("#modal-05").css("display","block");
		
	$("#marketing").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-05").css("display","none");

	$("#marketing").fadeOut(200, function() {
	});
	return false;
  });
</script>