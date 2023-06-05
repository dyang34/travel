
<!-- 입원, 수술, 질병확진 start -->
<div name="divNationDisease" class="modal disease">
        <div class="modal-bg">
            <div class="modal-cont">
				<div class="title-wrap">
					<h2>입원, 수술, 질병확진</h2>
					<a class="close md-close"></a>
				</div>

                <div class="cont-box-wrap">
                    <p>암, 백혈병, 협심증, 심근경색, 심장판막증, 간경화증, 뇌졸중증(뇌출혈, 뇌경색), 에이즈 및 HIV</p>
                </div>
            </div>
        </div> 
    </div> 

    <script>
		$("a[name=disease ]").click(function(){
			var btn = $(this).attr("motion");
			//alert(btn);
			$("div[name=divNationDisease]").removeClass("out").addClass(btn);
		});
 
        $(".md-close").click(function(){
             $(".modal.disease").addClass("out");
        });
    </script>
<!-- 입원, 수술, 질병확진 end -->

