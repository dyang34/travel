<?
    $root_dir = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));

//    require_once $root_dir."/travel/db/include/common.php";
//    require_once $root_dir."/travel/db/config/get_site_config_member_no.php";

require_once $root_dir."/tscommon3/include/common.php";
include_once $root_dir."/config/get_site_config_member_no.php";



    
    echo $root_dir."<br/>";

$sql_check="select * from hana_plan where no = '22453' and order_type='1'";
$result_check=mysql_query($sql_check);
$row_check=mysql_fetch_array($result_check);


$all_price=0;

$sql_mem="select * from hana_plan_member where no='50444'";
$result_mem=mysql_query($sql_mem);
$row_mem=mysql_fetch_array($result_mem);

//print_r($row_mem);


        $kakao_phone="82".substr(decode_pass($row_mem['hphone'],$pass_key), 1,10);

        echo "|".$kakao_phone."|<br/>";

        $name_text=$row_mem['name'];

$msg=$row_mem['name']." 고객님! 유다이렉트 입니다.
메리츠화재 여행자(실손의료)보험 가입에 감사드립니다.

▶ 가입상품 : ".$type_text_array[$row_check['trip_type']]."여행보험
▶ 보험기간 : ".date("Y.m.d",strtotime($row_check['start_date']))." ".$row_check['start_hour']."시 ~ ".date("Y.m.d",strtotime($row_check['end_date']))." ".$row_check['end_hour']."시
▶ 가입자 : ".$name_text."
▶ 가입플랜 : 표준형
▶ 보험료 : ".number_format($all_price)."원

상세 가입내역은 아래 가입조회 URL을 통해 확인 가능합니다.
안전하고 즐거운 여행 되시길 바랍니다.

(가입조회)
https://".$_SERVER['HTTP_HOST']."/travel/db/m/check/check.php

* 사고접수/계약취소/정보변경 등은 유다이렉트 콜센터 1800-9010(평일09~18시)로 연락주시기 바랍니다.
* 해외여행 중 현지에서 사고 발생 시 24시간 한국어 안내가 지원되는 메리츠화재 우리말서비스 82-2-360-2407로 연락주시면 도움 받으실 수 있습니다.";

echo $msg."<br/>";

$msg=$row_mem['name']." 고객님! 투어세이프 입니다.
에이스손해보험 여행보험 가입 감사드립니다.

▶ 가입상품 : ".$type_text_array[$row_check['trip_type']]."여행보험
▶ 보험기간 : ".date("Y.m.d",strtotime($row_check['start_date']))." ".$row_check['start_hour']."시 ~ ".date("Y.m.d",strtotime($row_check['end_date']))." ".$row_check['end_hour']."시
▶ 가입자 : ".$name_text."
▶ 가입플랜 : 표준형
▶ 보험료 : ".number_format(1400)."원

상세 가입내역은 아래 가입조회 URL을 통해 확인 가능합니다.
안전하고 즐거운 여행 되시길 바랍니다.

(가입조회)
https://".$_SERVER['HTTP_HOST']."/tscommon/check/01.php

* 사고접수/계약취소/정보변경 등은 투어세이프 여행보험 콜센터 1800-9010(평일09~18시)로 연락주시기 바랍니다.
* 해외여행 중 현지에서 사고 발생 시 24시간 한국어 안내가 지원되는 에이스손해보험 긴급지원서비스 센터 82-2-3449-3500로 연락주시면 도움 받으실 수 있습니다.";

echo $msg."<br/>";

//								sendTalk_common_notice($kakao_phone, "tour_common_notice", $msg, "https://".$_SERVER['HTTP_HOST']."/travel/db/m/check/check.php");
sendTalk_common_notice($kakao_phone, "tour_common_notice2", $msg, "https://".$_SERVER['HTTP_HOST']."/tscommon/check/01.php");


?>