<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/common.php";

if(!is_mobile_agent()) {
	header("Location: https://".$_SERVER['HTTP_HOST']."/travel/db/");
}

if(empty($__SITE_META_TITLE)) {
	$__SITE_META_TITLE = "메리츠화재 - 여행자를 위한 간편보험 가입";
}

if($__SITE_META_TITLE_FIX) {
	$__SITE_META_TITLE = $__SITE_META_TITLE_FIX;
}

if(empty($__SITE_META_DESC)) {
	$__SITE_META_DESC = "국내, 해외 어디든 공인인증서 없이 간편하게 가입하는 든든한 여행자보험. 비자, 출입국 정도 등 여행에 관련한 보든 정보를 제공합니다.";
}
  
/*
if($mNum<>'0') {
	echo "<pre>";print_r($_SESSION);echo "</pre>";
}
*/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
    <title><?=$__SITE_META_TITLE?></title>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="<?=$__SITE_META_TITLE?>" />
    <meta name="description" content="<?=$__SITE_META_DESC?>">
	<meta name="author" content="비아이에스">
	<meta name="keywords" content="여행자보험, 여행자보험추천, 여행자보험비교, 국내여행자보험, 여행보험, 해외여행자보험, 해외여행보험, 여행, 해외여행, 국내여행, 휴가, 출장, 유학, 유학생보험, 유학보험, 메리츠화재">

	<meta property="og:title" content="<?=$__SITE_META_TITLE?>" >
	<meta property="og:url" content="<?="https://".$_SERVER["HTTP_HOST"]?>">
	<meta property="og:image" content="<?="https://".$_SERVER["HTTP_HOST"]."/travel/db/image/common/og_tag_img.jpg"?>" >
	<meta property="og:description" content="<?=$__SITE_META_DESC?>" />

	<meta name="viewport" content="user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,width=device-width">

	<link rel="canonical" href="<?="https://".$_SERVER['HTTP_HOST'].str_replace("/travel/db/m/","/travel/db/",$_SERVER['REQUEST_URI'])?>">

	<link rel="icon" type="image/png" sizes="32x32" href="/travel/db/favicon.ico?v=<?=time()?>">

	<link rel="stylesheet" type="text/css" href="/travel/db/css/jquery-ui.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/style.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/basic.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/button.css?v=<?=time()?>">

<? if($mNum==0): ?>
  <link rel="stylesheet" href="/travel/db/m/css/swiper-bundle.min.css?v=<?=time()?>">
  <link rel="stylesheet" type="text/css" href="/travel/db/m/css/main.css?v=<?=time()?>">
<? elseif($mNum==1): ?>
<link rel="stylesheet" href="/travel/db/m/css/swiper-sub.min.css?v=<?=time()?>">
<? endif ?>

	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/sub.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/trip.css?v=<?=time()?>">  

	<script type="text/javascript" src="/travel/db/js/jquery-3.6.1.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/jquery-ui.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/m/js/script.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/placeholders.min.js?v=<?=time()?>"></script> 
	<script type="text/javascript" src="/travel/db/m/js/common.js?v=<?=time()?>"></script> 

<?php	
if(defined('_TOURSAFE_SUBSITE_COLOR') && defined('_TOURSAFE_SUBSITE_COLOR_S1') && defined('_TOURSAFE_SUBSITE_COLOR_S2')) {
?>		
	<style>
		:root {
		--color-point: <?=_TOURSAFE_SUBSITE_COLOR?>;
		--color-point-s1: <?=_TOURSAFE_SUBSITE_COLOR_S1?>;
		--color-point-s2: <?=_TOURSAFE_SUBSITE_COLOR_S2?>;
		}
	</style>
<?php
}
?>
<?/* https://wickedmagic.tistory.com/537 */?>

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

	<div class="mwrap">
		<header>
			<h1>
			<a <?=_UDIRECT_SUBSITE_USE_TYPE!=2?"href='/travel/db/m/index.php'":""?>>
<?php
          if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/logo_meritz.png")) {
?>
            <img src="/img/logo_meritz.png" alt="로고">
<?php
          } else {
?>
				<img src="/travel/db/m/image/common/logo-meritz-row.png" alt="메리츠화재 로고">
<?php
		  }
?>				
				<span><img src="/travel/db/m/image/common/icon-multiply.png" alt="x"></span>
			</a>
			<a <?=_UDIRECT_SUBSITE_USE_TYPE!=2?"href='https://udirect.co.kr/'":""?>>
				<img src="/travel/db/m/image/common/logo-direct.png" alt="다이렉트 여행자 보험 로고">
			</a>
			</h1>
			<div class="icon-list" onclick="openNav()">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div id="Sidenav" class="sidenav">
				<h1>
					<a <?=_UDIRECT_SUBSITE_USE_TYPE!=2?"href='/travel/db/m/index.php'":""?>>
<?php
          if(!file_exists($_SERVER['DOCUMENT_ROOT']."/img/logo_meritz.png")) {
?>
						<img src="/travel/db/m/image/common/meritz_logo_white.png?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/m/image/common/meritz_logo_white.png")?>" alt="메리츠화재 로고">
						<span><img src="/travel/db/m/image/common/icon-multiply_white.png?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/m/image/common/icon-multiply_white.png")?>" alt="x"></span>
<?php
		  }
?>
					</a>
					<a <?=_UDIRECT_SUBSITE_USE_TYPE!=2?"href='https://udirect.co.kr/'":""?>>	
						<img src="/travel/db/m/image/common/logo-direct-white.png?v=<?=filemtime($_SERVER['DOCUMENT_ROOT']."/travel/db/m/image/common/logo-direct-white.png")?>" alt="유라이프 로고">
					</a>

					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="/travel/db/m/image/common/icon-X.png" alt="메리츠화재 로고"></a>
				</h1>
				<ul>
<?php
	if(_UDIRECT_SUBSITE_USE_TYPE != 2) {
?>
					<li>
						<a href="/travel/db/m/life/life_list.php">라이프</a>
					</li>
<?php
	}
?>						
					<li>
						<a href="/travel/db/m/trip/step0101.php">보험료 계산/가입</a>
					</li>
					<li>
						<a href="/travel/db/m/check/check.php">가입조회</a>
					</li>
<?php
	if(_UDIRECT_SUBSITE_USE_TYPE != 2) {
?>
					<li>
						<a href="/travel/db/m/service/faq.php">FAQ</a>
					</li>
<?php
	}
?>						
				</ul>
			</div>
		</header>