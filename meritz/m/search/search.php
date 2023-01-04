<? $mNum = "3";  $sNum = "1"; ?>
<?php include '../layout/header.php'; ?>
<div class="search-wrap">
	<h2>가입내역 조회</h2>
	<div class="box-gray">
		<h3>주민등록번호</h3>
		<ul>
			<li>
				<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="input01" placeholder="앞 6자리" maxlength='6'>
			</li>
			<li>~</li>
			<li>
				<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="input01" placeholder="뒤 7자리" maxlength='7'>
			</li>
		</ul>
	</div>

	<div class="button-center">
		<a href="search-finish.php" class="button red">조회하기</div>
	</div>
</div>

<?php include '../layout/footer.php'; ?>