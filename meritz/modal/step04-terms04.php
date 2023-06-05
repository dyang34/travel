
<!-- 보험약관 start -->
<div name="divNationTerms4" class="modal terms2">
        <div class="modal-bg">
            <div class="modal-cont">
				<div class="title-wrap">
					<h2>보험약관</h2>
					<a class="close md-close"></a>
				</div>

                <div class="cont-box-wrap">
                    <p>보험계약청약 시 기재된 내용이 사실과 다르거나 누락된 사항이 없는지 확인하시고, 사실과 다르거나, 누락된 사항이 있으면 보험약관에 의하여 보험계약의 해지 또는 보험금 불지급 등의 불이익을 당할 수 있으니, 약관을 충분히 읽어보시기 바랍니다.</p>
                </div>
            </div>
        </div> 
    </div> 

    <script>
		$("a[name=terms04 ]").click(function(){
			var btn = $(this).attr("motion");
			//alert(btn);
			$("div[name=divNationTerms4]").removeClass("out").addClass(btn);
		});
 
        $(".md-close").click(function(){
             $(".modal.terms2").addClass("out");
        });
    </script>
<!-- 보험약관 end -->

