<?php
function chk_step_session($pageStepNo) {

    switch($pageStepNo) {
        case 1:
            if(empty($_SESSION["travel_step"]["1"]["trip_type"]) || empty($_SESSION["travel_step"]["1"]["trip_purpose"]) || 
//                empty($_SESSION["travel_step"]["1"]["trip_group_type"]) || empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation"]) || empty($_SESSION["travel_step"]["1"]["start_date"]) || 
                empty($_SESSION["travel_step"]["1"]["start_hour"]) || empty($_SESSION["travel_step"]["1"]["end_date"]) || 
                empty($_SESSION["travel_step"]["1"]["end_hour"])) {
                return 1;
            }
            break;
        case 2:
            if(empty($_SESSION["travel_step"]["1"]["trip_type"]) || empty($_SESSION["travel_step"]["1"]["trip_purpose"]) || 
//                empty($_SESSION["travel_step"]["1"]["trip_group_type"]) || empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation"]) || empty($_SESSION["travel_step"]["1"]["start_date"]) || 
                empty($_SESSION["travel_step"]["1"]["start_hour"]) || empty($_SESSION["travel_step"]["1"]["end_date"]) || 
                empty($_SESSION["travel_step"]["1"]["end_hour"])) {
                return 1;
            }

            if(count($_SESSION["travel_step"]["1"]["member"]) < 1) {
                return 1;
            }

            break;
        case 3:
            if(empty($_SESSION["travel_step"]["1"]["trip_type"]) || empty($_SESSION["travel_step"]["1"]["trip_purpose"]) || 
//                empty($_SESSION["travel_step"]["1"]["trip_group_type"]) || empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation"]) || empty($_SESSION["travel_step"]["1"]["start_date"]) || 
                empty($_SESSION["travel_step"]["1"]["start_hour"]) || empty($_SESSION["travel_step"]["1"]["end_date"]) || 
                empty($_SESSION["travel_step"]["1"]["end_hour"])) {
                return 1;
            }

            if(count($_SESSION["travel_step"]["1"]["member"]) < 1) {
                return 1;
            }

            if(empty($_SESSION["travel_step"]["2"]["sum_price"]) || empty($_SESSION["travel_step"]["2"]["plan_type"]) ||
                empty($_SESSION["travel_step"]["2"]["plan_title"]) || empty($_SESSION["travel_step"]["2"]["term_day"])) {
                return 1;
            }

            break;

        case 4:
            if(empty($_SESSION["travel_step"]["1"]["trip_type"]) || empty($_SESSION["travel_step"]["1"]["trip_purpose"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
//                empty($_SESSION["travel_step"]["1"]["trip_group_type"]) || empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation"]) || empty($_SESSION["travel_step"]["1"]["start_date"]) || 
                empty($_SESSION["travel_step"]["1"]["start_hour"]) || empty($_SESSION["travel_step"]["1"]["end_date"]) || 
                empty($_SESSION["travel_step"]["1"]["end_hour"])) {
                return 1;
            }

            if(count($_SESSION["travel_step"]["1"]["member"]) < 1) {
                return 1;
            }

            if(empty($_SESSION["travel_step"]["2"]["sum_price"]) || empty($_SESSION["travel_step"]["2"]["plan_type"]) ||
                empty($_SESSION["travel_step"]["2"]["plan_title"]) || empty($_SESSION["travel_step"]["2"]["term_day"])) {
                return 1;
            }

            for($i=0;$i<count($_SESSION["travel_step"]["1"]["member"]);$i++) {
                if(empty($_SESSION["travel_step"]["1"]["member"][$i]["birth"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["gender"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["name"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["jumin2"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["cal_age"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["is_dual"])) {
                    return 1;
                }

                if($i < 1) {
                    if(empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone1"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone2"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone3"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["email1"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["email2"])) {
                        return 1;
                    }
                }

                if($_SESSION["travel_step"]["1"]["member"][$i]["is_dual"]=="Y" && empty($_SESSION["travel_step"]["1"]["member"][$i]["nation_name"])) {
                    return 1;
                }
            }

            break;
        case 5:
            if(empty($_SESSION["travel_step"]["1"]["trip_type"]) || empty($_SESSION["travel_step"]["1"]["trip_purpose"]) || 
//                empty($_SESSION["travel_step"]["1"]["trip_group_type"]) || empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation_search"]) || 
                empty($_SESSION["travel_step"]["1"]["nation"]) || empty($_SESSION["travel_step"]["1"]["start_date"]) || 
                empty($_SESSION["travel_step"]["1"]["start_hour"]) || empty($_SESSION["travel_step"]["1"]["end_date"]) || 
                empty($_SESSION["travel_step"]["1"]["end_hour"])) {
                return 1;
            }

            if(count($_SESSION["travel_step"]["1"]["member"]) < 1) {
                return 1;
            }

            if(empty($_SESSION["travel_step"]["2"]["sum_price"]) || empty($_SESSION["travel_step"]["2"]["plan_type"]) ||
                empty($_SESSION["travel_step"]["2"]["plan_title"]) || empty($_SESSION["travel_step"]["2"]["term_day"])) {
                return 1;
            }

            for($i=0;$i<count($_SESSION["travel_step"]["1"]["member"]);$i++) {
                if(empty($_SESSION["travel_step"]["1"]["member"][$i]["birth"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["gender"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["name"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["jumin2"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["cal_age"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["is_dual"]) ||

                    $_SESSION["travel_step"]["1"]["member"][$i]["price"] == "" ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["plan_code"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["plan_title"]) ||
                    empty($_SESSION["travel_step"]["1"]["member"][$i]["plan_title_src"]) 
                    ) {
                    return 1;
                }

                if($i < 1) {
                    if(empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone1"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone2"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["hphone3"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["email1"]) ||
                        empty($_SESSION["travel_step"]["1"]["member"][$i]["email2"])) {
                        return 1;
                    }
                }

                if($_SESSION["travel_step"]["1"]["member"][$i]["is_dual"]=="Y" && empty($_SESSION["travel_step"]["1"]["member"][$i]["nation_name"])) {
                    return 1;
                }
            }
            
            if($_SESSION["travel_step"]["4"]["check_type1"] != "N" ||
                $_SESSION["travel_step"]["4"]["check_type2"] != "N" ||
                $_SESSION["travel_step"]["4"]["check_type3"] != "N" ||
                $_SESSION["travel_step"]["4"]["check_type4"] != "N" ||
                $_SESSION["travel_step"]["4"]["chk1"] != "Y" ||
                $_SESSION["travel_step"]["4"]["select_agree"] != "Y" ||
                $_SESSION["travel_step"]["4"]["chk3_1"] != "Y" ||
                $_SESSION["travel_step"]["4"]["chk3_2"] != "Y" ||
                $_SESSION["travel_step"]["4"]["chk3_3"] != "Y" ||
                $_SESSION["travel_step"]["4"]["chk4"] != "Y" ||
                empty($_SESSION["travel_step"]["4"]["tmp_no"])) {
                return 1;
            }

            if ($_SESSION["travel_step"]["1"]["trip_type"]=="1" && $_SESSION["travel_step"]["4"]["check_type5"] != "N") {
                return 1;
            }

            break;
        default:
            return 2;
            exit;
    }
    
    return 0;
}
?>