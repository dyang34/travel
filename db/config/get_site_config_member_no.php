<?
    if ($arrSiteConfig[$member_no]["plan_price_except"]=="Y") {
        $site_config_member_no = $member_no;
    } else {
        $site_config_member_no = 20000;
    }
    
    if ($arrSiteConfig[$member_no]["plan_type_except"]=="Y") {
        $site_config_type_member_no = $member_no;
    } else {
        $site_config_type_member_no = 20000;
    }
?>