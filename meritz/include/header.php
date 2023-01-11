<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/meritz/include/common.php";

if(is_mobile_agent()) {
	header("Location: https://".$_SERVER['HTTP_HOST']."/travel/meritz/m/");
}

if(empty($__SITE_META_TITLE)) {
  $__SITE_META_TITLE = "메리츠화재 - 여행자를 위한 간편보험 가입";
}

if(empty($__SITE_META_DESC)) {
  $__SITE_META_DESC = "국내, 해외 어디든 공인인증서 없이 간편하게 가입하는 든든한 여행자보험. 비자, 출입국 정도 등 여행에 관련한 보든 정보를 제공합니다.";
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <title><?=$__SITE_META_TITLE?></title>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,width=device-width">
  
  <meta name="title" content="<?=$__SITE_META_TITLE?>" />
  <meta name="description" content="<?=$__SITE_META_DESC?>" />
  <meta name="author" content="비아이에스">
  <meta name="keywords" content="여행자보험, 여행자보험추천, 여행자보험비교, 국내여행자보험, 여행보험, 해외여행자보험, 해외여행보험, 여행, 해외여행, 국내여행, 휴가, 출장, 유학, 유학생보험, 유학보험, 메리츠화재">

  <meta property="og:title" content="<?=$__SITE_META_TITLE?>" >
  <meta property="og:url" content="<?="https://".$_SERVER["HTTP_HOST"]?>">
  <meta property="og:image" content="<?="https://".$_SERVER["HTTP_HOST"]."/travel/meritz/image/common/og_tag_img.jpg"?>" >
  <meta property="og:description" content="<?=$__SITE_META_DESC?>" />

  <link rel="icon" type="image/png" sizes="32x32" href="/travel/meritz/favicon.ico?v=<?=time()?>">

  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/style.css?v=<?=time()?>">
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/basic.css?v=<?=time()?>">
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/button.css?v=<?=time()?>">
  <!-- Link Swiper's CSS -->
  <? if($mNum==0): ?>
  <link rel="stylesheet" href="/travel/meritz/css/swiper-bundle.min.css?v=<?=time()?>">
  <? elseif($mNum==1): ?>
  <link rel="stylesheet" href="/travel/meritz/css/swiper-sub.min.css?v=<?=time()?>">
  <? elseif($mNum==2): ?>
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/jquery-ui.css?v=<?=time()?>">
  <? endif ?>
  <!-- Main CSS -->
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/main.css?v=<?=time()?>">
  <!-- Sub CSS -->
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/sub.css?v=<?=time()?>">  
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/modal.css?v=<?=time()?>">

  <!-- mobile CSS -->
  <link rel="stylesheet" type="text/css" href="/travel/meritz/css/mobile.css?v=<?=time()?>">

  <script type="text/javascript" src="/travel/meritz/js/jquery-3.6.1.min.js?v=<?=time()?>"></script>
  <script src="/travel/meritz/js/script.js?v=<?=time()?>"></script>
  <script src="/travel/meritz/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="/travel/meritz/js/common.js?v=<?=time()?>"></script>

<script type="text/javascript" src="/travel/meritz/js/design.js?v=<?=time()?>"></script>
<script type="text/javascript" src="/travel/meritz/js/placeholders.min.js?v=<?=time()?>"></script> 

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KR5Q5PM');</script>
<!-- End Google Tag Manager -->

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KR5Q5PM"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <div id="wrap">
    <!-- /** header start -->
    <header>
      <h1>
        <a href="/travel/meritz/index.php">
          <span>
<?php
          if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/logo_meritz.png")) {
?>
            <img src="/img/logo_meritz.png" alt="로고">
<?php
          } else {
?>
            <img src="/travel/meritz/image/common/logo-meritz-row.png" alt="메리츠화재 로고">
<?php
          }
?>
          </span>
          <span><img src="/travel/meritz/image/common/icon-multiply.png" alt="icon multiply"></span>
        </a>
        <a href="https://udirect.co.kr/">
          <span><img src="/travel/meritz/image/common/logo-direct.png" alt="유다이렉트 로고"></span>
        </a>
      </h1>
      <nav>
        <ul class="clearfix inb">
          <li class="menu02"><a href="/travel/meritz/trip/step0101.php">보험료 계산/가입</a></li>
		  <li class="menu03 <?=($mNum==3)?"active":""?>"><a href="/travel/meritz/check/check.php">가입조회</a></li>
          <li class="menu01 <?=($mNum==1)?"active":""?>"><a href="/travel/meritz/life/life_list.php">라이프</a></li>
          <li class="menu04 <?=($mNum==4)?"active":""?>"><a href="/travel/meritz/service/faq.php">FAQ</a></li>
        </ul>
      </nav>
      <div class="mobile-gnb" onclick="openNav()">
		    <span></span>
      </div>
      <div id="Sidenav" class="sidenav">
        <div class="close-box">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		</div>
        <ul class="gnb">
          <li><a href="/travel/meritz/trip/step0101.php" class="">보험료 계산/가입</a></li>
          <li><a href="/travel/meritz/check/check.php" class="">가입조회</a></li>
          <li><a href="/life/life-list.php" class="">라이프</a></li>
          <li><a href="/travel/meritz/service/faq.php" class="">FAQ</a></li>
        </ul>
      </div>
    </header>
    <!-- header end **/ -->