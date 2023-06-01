<!-- /** 입원, 수술, 질병확진 Start -->
<div id="hospitalize">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>입원, 수술, 질병확진</h2>
      <div class="content">
        <ul>
          <li>
            암, 백혈병, 협심증, 심근경색, 심장판막증, 간경화증, 뇌졸중증(뇌출혈, 뇌경색), 에이즈 및 HIV
          </li>
        </ul>
      </div>

      <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 입원, 수술, 질병확진 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-hosp").click(function(){
    //$("#modal-08").css("display","block");

	$("#hospitalize").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-08").css("display","none");

	$("#hospitalize").fadeOut(200, function() {
	});
	return false;
  });
</script>