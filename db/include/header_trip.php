<?
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/common.php";

if(is_mobile_agent()) {
	header("Location: https://".$_SERVER['HTTP_HOST']."/travel/db/m/trip/step0101.php");
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
  
if ($_GET["adm_show_session"]=="Y") {
	echo "<pre>";print_r($_SESSION);echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="title" content="<?=$__SITE_META_TITLE?>" />
	<meta name="description" content="<?=$__SITE_META_DESC?>" />
	<meta name="author" content="비아이에스">
	<meta name="keywords" content="여행자보험, 여행자보험추천, 여행자보험비교, 국내여행자보험, 여행보험, 해외여행자보험, 해외여행보험, 여행, 해외여행, 국내여행, 휴가, 출장, 유학, 유학생보험, 유학보험, 메리츠화재">

	<meta property="og:title" content="<?=$__SITE_META_TITLE?>" >
	<meta property="og:url" content="<?="https://".$_SERVER["HTTP_HOST"]?>">
	<meta property="og:image" content="<?="https://".$_SERVER["HTTP_HOST"]."/travel/db/image/common/og_tag_img.jpg"?>" >
	<meta property="og:description" content="<?=$__SITE_META_DESC?>" />

	<style>
		:root {
		--color-point: <?=_TOURSAFE_SUBSITE_COLOR?>;
		--color-point_s1: <?=_TOURSAFE_SUBSITE_COLOR_S1?>;
		--color-point-s2: <?=_TOURSAFE_SUBSITE_COLOR_S2?>;
		}
	</style>
	
	<link rel="alternate" media="only screen and (max-width: 640px)" href="<?="https://".$_SERVER['HTTP_HOST'].str_replace("/travel/db/","/travel/db/m/",$_SERVER['REQUEST_URI'])?>">

	<link rel="icon" type="image/png" sizes="32x32" href="/travel/db/favicon.ico?v=<?=time()?>">

	<title><?=$__SITE_META_TITLE?></title>
	<link rel="stylesheet" type="text/css" href="/travel/db/css/style.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/css/basic.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/css/button.css?v=<?=time()?>">

	<!-- jquery-ui -->
	<link rel="stylesheet" type="text/css" href="/travel/db/css/jquery-ui.css?v=<?=time()?>">

	<!-- Sub CSS -->
	<link rel="stylesheet" type="text/css" href="/travel/db/css/sub.css?v=<?=time()?>">   
	<link rel="stylesheet" type="text/css" href="/travel/db/css/modal.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/css/trip-new.css?v=<?=time()?>">

	<!-- mobile CSS -->
	<link rel="stylesheet" type="text/css" href="/travel/db/css/mobile.css?v=<?=time()?>">

<?/*
	
	<script src="http://code.jquery.com/jquery.min.js?v=<?=time()?>"></script>
	<script src="../js/jquery-ui.min.js?v=<?=time()?>"></script>
*/?>

	<script type="text/javascript" src="/travel/db/js/jquery-3.6.1.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/jquery-ui.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/script.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/common.js?v=<?=time()?>"></script> 
	<script type="text/javascript" src="/travel/db/js/placeholders.min.js?v=<?=time()?>"></script> 

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KR5Q5PM');</script>
<!-- End Google Tag Manager -->
	
</head>
<body class="trip-wrap">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KR5Q5PM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="wrap">
        <div class="head-wrap">
            <h1>여행자보험 가입</h1>
			<div class="end-btn">
				<a href="/travel/db/" class="link-end">종료 <i class="icon-end"></i></a>
			</div>
        </div>