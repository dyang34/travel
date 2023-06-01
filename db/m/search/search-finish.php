<? $mNum = "3";  $sNum = "2"; ?>
<?php include '../layout/header.php'; ?>
<div class="search-wrap">
	<h2>가입내역 조회</h2>

	<h3 class="title">여행자보헝 가입신청 정보</h3>	
	<table class="table-deepGray">
		<colgroup>
			<col width="20%">
			<col width="*">
		</colgroup>
		<tbody>
			<tr>
				<th>출발 일시</th>
				<td>2022-08-11  00시</td>
			</tr>
			<tr>
				<th>도착 일시</th>
				<td>2022-08-22  23시</td>
			</tr>
			<tr>
				<th>지역</th>
				<td>태국</td>
			</tr>
			<tr>
				<th>인원(2명)</th>
				<td>
				<p>이** (800101)   ￦30,000원</p>
				<p>김** (820202)   ￦52,000원</p>
				</td>
			</tr>
		</tbody>
	</table>

	<div class="button-center">
		<a href="search-finish.php" class="button red">확인</div>
	</div>
</div>

<?php include '../layout/footer.php'; ?>