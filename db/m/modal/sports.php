<!-- /** 위험한 레포츠 Start -->
<div id="sports">
  <div class="modal-bg">
    <div class="modal-cont">
      <h2>위험한 레포츠</h2>
      <div class="content">
        <ul>
          <li>
            스쿠버다이빙, 행글라이딩/패러글라이딩, 스카이다이빙, 수상스키, 자동차/오토바이경주, 번지점프, 빙벽/암벽등반, 제트스키, 래프팅, 이와 비슷한 위험도가 높은 활동
          </li>
        </ul>
      </div>

      <a class="close">&times;</a>
    </div>
  </div>
</div>
<!-- 위험한 레포츠 End **/ -->

<script>
  // Layer-Popup Active
  $("#btn-sport").click(function(){
    //$("#modal-07").css("display","block");
		
	$("#sports").fadeIn(200, function() {
	});
	return false;	// return false 를 해야 화면 상단으로 이동되는 현상이 막힘.
  });
  $(".close").click(function(){
    //$("#modal-07").css("display","none");

	$("#sports").fadeOut(200, function() {
	});
	return false;
  });
</script>