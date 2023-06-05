
<!-- 상품안내 start -->
<div name="divNationLong" class="modal product">
        <div class="modal-bg">
            <div class="modal-cont">
				<div class="title-wrap">
					<h2>상품안내</h2>
					<a class="close md-close"></a>
				</div>

                <!-- Banner start -->
                <div class="prod-bnnr">
                    <div class="box-list">
                        <div class="circle">
                            <i class="icon-browser">편리한 가입</i>
                        </div>
                        <strong>편리한 가입</strong>
                    </div>
                    <div class="box-list">
                        <div class="circle">
                            <i class="icon-inde">든든한보장</i>
                        </div>
                        <strong>든든한 보장</strong>
                    </div>
                    <div class="box-list">
                        <div class="circle">
                            <i class="icon-simple">간편보험청구</i>
                        </div>
                        <strong>간편 보험청구</strong>
                    </div>
                </div>
                <!-- Banner end -->
                 
                <h3>상품 설명</h3>
                <div class="bnnr-box">
                    <div class="round-box">
                        <div class="title">
                            <i class="icon-medical"></i>
                            <strong>해외 의료실비 보장</strong>
                        </div>
                        <p>해외장기체류 중 발생한 상해·질병 치료비 등을 보장</p>
                    </div>
                    
                    <div class="round-box">
                        <div class="title">
                            <i class="icon-actual"></i>
                            <strong>중대사고 구조송환 비용</strong>
                        </div>
                        <p>제3자 배상책임 및 예상치 중대사고 발생시 구조송환 비용 보장</p>
                    </div>
                    
                    <div class="round-box">
                        <div class="title">
                            <i class="icon-language"></i>
                            <strong>우리말 도움 서비스</strong>
                        </div>
                        <p>응급사항 또는 여행관련 도움이 필요한 경우 365일 24시간 우리말로 상담</p>
                    </div>
                </div>

                <div class="bottom-box">
                    <div class="text">※ 준법감시인 심의필 제2022-광고-1566호(2022.11.04~2023.11.03)</div>
                    <div class="img"><img src="/travel/meritz/img/common/modal-hyundai.png?e" alt=""></div>
                </div>
            </div>
        </div> 
    </div> 

    <script>
		$("a[name=long]").click(function(){
			var btn = $(this).attr("motion");
			//alert(btn);
			$("div[name=divNationLong]").removeClass("out").addClass(btn);
		});
 
        $(".md-close").click(function(){
             $(".modal.product").addClass("out");
        });
    </script>
<!-- 상품안내 end -->

