<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";
?>

<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<div class="terms-wrap">
  <h2>국내여행보험약관</h2> 
  <ul>
    <li>
      <strong>1. 고객정보의 수집 및 이용 목적</strong>
    </li>
    <li>
      당사를 통해 보험가입을 함에 있어 메리츠화재보험(주)의 보험계약 인수심사, 계약체결, 유지, 관리(갱신 포함), 보험금 등 지급/심사, 순보험요율의 산출/검증, 민원처리 및 분쟁 대응, 보험사고조사(보험사기 조사 포함), 보험모집질서 유지 및 보험상품 추천 등
    </li>

    <li>
      <strong>2. 수집하는 개인정보 항목 및 수집방법</strong>
    </li>
    <li class="type_circle">
      ① 수집, 이용할 개인정보의 내용<br>개인식별정보(성명, 주민등록번호(외국인등록번호), 전자우편주소, 휴대폰번호) 보험계약정보, 피보험자의 질병 및 상해에 관한 정보, 보험금지급 관련 정보, 결제정보(신용카드, 계좌번호)
    </li>
    <li class="type_circle">
      ② 수집방법: 인터넷 홈페이지, 전화, 팩스, 한국신용정보원 조회서비스
    </li>
    <li>
      <strong>제3조 (약관의 효력 등)</strong>
    </li>
    <li class="type_number">
      1) 이 약관은 “회사”가 “플랫폼”에 게시하는 방법으로 이용자에게 고지함으로써 그 효력이 생깁니다.
    </li>
    <li class="type_number">
      2) “회사”가 이 약관을 개정할 경우에는 적용일 및 개정사유를 명시하여 그 적용일의 1주 전부터 적용일의 전일까지 1)항과 같은 방법으로 고지합니다. 이 때, 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정전의 약관조항이 적용됩니다.
    </li>
    <li class="type_number">
      3) 이용자는 서비스를 계속 이용함으로써 개정된 약관에 동의한 것으로 간주됩니다.
    </li>
    <li class="type_number">
      4) 회원은 개정된 약관에 동의하지 않을 경우 회원 탈퇴를 요청할 수 있습니다.
    </li>
  </ul>
</div>
<?php
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>