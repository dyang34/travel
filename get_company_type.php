<?php
require_once $_SERVER['DOCUMENT_ROOT']."/include/common_siteinfo.php";

$arrSysCompanyTypeKey = [
	"2"=>"meritz"
	,"4"=>"hanhwa"
];

if($_REQUEST["pcomtype"] && $arrSysCompanyTypeKey[$_REQUEST["pcomtype"]]) {
    $SysCompanyTypeKey = $arrSysCompanyTypeKey[$_REQUEST["pcomtype"]];
} else {
    if (defined('_UDIRECT_SUBSITE_COMPANY_TYPE')) {
        $SysCompanyTypeKey = $arrSysCompanyTypeKey[_UDIRECT_SUBSITE_COMPANY_TYPE];
    }
    $SysCompanyTypeKey = $arrSysCompanyTypeKey[2];
}
?>