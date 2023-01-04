<!-- /** 보험약관 Start -->
<div id="modal-03">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>보험약관</h2>  
      <div class="content">
        <ul>
          <li>
            보험계약청약 시 기재된 내용이 사실과 다르거나 누락된 사항이 없는지 확인하시고, 사실과 다르거나, 누락된 사항이 있으면 보험약관에 의하여 보험계약의 해지 또는 보험금 불지급 등의 불이익을 당할 수 있으니, 약관을 충분히 읽어보시기 바랍니다.
          </li>
        </ul>
      </div>
      
	  <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 보험약관 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-mod3").click(function(){
    //$("#modal-03").css("display","block");
		
	$("#modal-03").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-03").css("display","none");

	$("#modal-03").fadeOut(200, function() {
	});
	return false;
  });
</script>