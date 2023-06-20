<!-- /** 특정질병 Start -->
<div id="specific">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>특정질병</h2>
      <div class="content">
        <ul>
          <li>
            암, 백혈병, 협심증, 심근경색, 심장판막증, 간경화증, 뇌졸중(뇌출혈, 뇌경색), 당뇨병, 에이즈(AIDS) 및 HIV보균
          </li>
        </ul>
      </div>

      <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 특정질병 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-spec").click(function(){
    //$("#modal-06").css("display","block");
		
	$("#specific").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-06").css("display","none");

	$("#specific").fadeOut(200, function() {
	});
	return false;
  });
</script>