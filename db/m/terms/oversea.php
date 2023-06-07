<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

require_once $SYS_ROOT_DIR."/travel/db/m/include/header.php";
?>

<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<div class="terms-wrap">
  <h2>해외여행보험약관</h2> 
  <ul>
    <li>
      <strong>1. 고객정보의 수집 및 이용 목적</strong>
    </li>
    <li>
      당사를 통해 보험가입을 함에 있어 DB손해보험(주)의 보험계약 인수심사, 계약체결, 유지, 관리(갱신 포함), 보험금 등 지급/심사, 순보험요율의 산출/검증, 민원처리 및 분쟁 대응, 보험사고조사(보험사기 조사 포함), 보험모집질서 유지 및 보험상품 추천 등
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
  </ul>
</div>
<?php
require_once $SYS_ROOT_DIR."/travel/db/m/include/footer.php";
?>