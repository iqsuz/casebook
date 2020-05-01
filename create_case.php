<?php
    session_start();

    require_once("./inc/db_query.php");
    require_once("./inc/security.php");
    require_once("./inc/taskmaster.php");

    $db = new DBQuery();
    $security = new Security();
    $taskmaster = new Taskmaster();

    //Posted data is assinged to variables for convenience. During assignment basic validation is perfromed as well.
    $model = $security->basic_validation($_POST["model"]);
    $seq = $security->basic_validation($_POST["seq"]);
    $body_no = $security->basic_validation($_POST["body_no"]);
    $part_name = strtoupper($security->basic_validation($_POST["part_name"]));
    $part_no = strtoupper($security->basic_validation($_POST["part_no"]));
    $o_place = ucwords($security->basic_validation($_POST["o_place"]));
    $problem_des = $security->basic_validation($_POST["problem_des"]);
    $responsible = $security->basic_validation($_POST["responsible"]);
    $files = $_FILES["files"];
    $house = $security->basic_validation($_POST["house"]);
    $user = $_SESSION["userE_ID"];

    //UID has been created for current registration.
    $last_uid = $db->get_last_uid($house);
    $uid = $taskmaster->create_uid($last_uid, $house);

    if($house == "M"){
        if(!$security->check_seq($seq)){
            echo $security->error_msg; die();
        }

        if($body_no != ""){
            if(!$security->check_body_no($body_no)){
                echo $security->error_msg; die();
            }
        }

        if(!$security->check_part_name($part_name)){
            echo $security->error_msg; die();
        }

        if($part_no != ""){
            if(!$security->check_part_no($part_no)){
                echo $security->error_msg; die();
            }
        }

        if(!$security->check_o_place($o_place)){
            echo $security->error_msg; die();
        }   

        if(!$security->check_problem_des($problem_des)){
            echo $security->error_msg; die();
        }

        if($responsible != ""){
            if(!$security->check_responsible($responsible)){
                echo $security->error_msg; die();
            }
        }

        if(!$security->check_files($files)){
            echo $security->error_msg; die();
        }
    }

    if($house == "O"){
        if(!$security->check_body_no($body_no)){
            echo $security->error_msg; die();
        }


        if(!$security->check_part_name($part_name)){
            echo $security->error_msg; die();
        }

        if($part_no != ""){
            if(!$security->check_part_no($part_no)){
                echo $security->error_msg; die();
            }
        }

        if(!$security->check_o_place($o_place)){
            echo $security->error_msg; die();
        }   

        if(!$security->check_problem_des($problem_des)){
            echo $security->error_msg; die();
        }

        if(!$security->check_files($files)){
            echo $security->error_msg; die();
        }
    }

    //Time has been stamped.
    date_default_timezone_set("America/Chicago");
    $datetime = date("Y-m-d H:i:s");

    //Shift is being calculated based on $datetime.
    $shift = $taskmaster->calculate_shift($datetime);    

    //Posted info regarding defect is being registered.
    $result = $db->register_defect($uid, $model, $seq, $body_no, $part_name, $part_no, $o_place, $problem_des, $responsible, $user, $datetime, $shift, $house);
    
    if(!$result){
        echo "Something went wrong while defect registration.";
        die();
    }

    $path_N_names = $taskmaster->save_files($uid, $datetime, $model, $seq, $body_no, $house, $files);

    if(!$path_N_names){
        echo "Error while uploading defect pictures.";
        $db->delete_defect($uid);
        $taskmaster->remove_files($path_N_names);
        die();
    }
    
    if(!$db->save_files_to_db($uid, $path_N_names)){
        echo "Error while pic registration to database.";
        $db->delete_defect($uid);
        $taskmaster->remove_files($uid,$datetime,$model,$body_no,$pics);
        die();
    }
    
?>