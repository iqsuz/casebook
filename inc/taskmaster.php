<?php
    class Taskmaster{
        function calculate_shift($datetime){
            $shiftA = date("06:30:00");
            $shiftB = date("14:30:00");
            $shiftC = date("22:30:00");

            $time = date("H:i:s", strtotime($datetime));

            if($time >= $shiftA and $time < $shiftB){
                $shift = "A";
            }else if($time >= $shiftB and $time < $shiftC){
                $shift = "B";
            }else{
                $shift = "C";
            }

            return $shift;
        }

        /*This function save uploaded files to server.
            Inputs: $uid, $date, $model, $body_no and $files
            This function generates direction by usind inputs. E.g 2020/04/DWF/O00000011-DWF-123456/[all files e.g :O00000011-202004072210-DWF123456-0.jpg]
            if save mission is successfully completed, function returns array with saved file names.*/
        function save_files($uid, $datetime, $model, $seq, $body_no, $house, $files){
            $paths = array();
            $file_names = array();
            
            $year = date("Y",strtotime($datetime));
            $month = date("m", strtotime($datetime));
            $monthname = date("M", strtotime($datetime));
            $day = date("d", strtotime($datetime));
            $hour = date("H", strtotime($datetime));
            $min = date("i", strtotime($datetime));

            if($house == "M"){
                $path = "./img/INLINE/".$year."/".$monthname."/".$day."/".$model."/".$uid."-SEQ-".$seq."/";
                $file_name = $uid."-".$year.$monthname.$day.$hour.$min."-".$model."-SEQ-".$seq;

                if(!is_dir($path)){
                    mkdir($path, 0777, TRUE);
                }else{
                    echo "Folder has already been created.";
                    return FALSE;
                }
            }

            if($house == "O"){
                $path = "./img/OEM/".$year."/".$monthname."/".$day."/".$model."/".$uid."-".$model."-".$body_no."/";
                $file_name = $uid."-".$year.$monthname.$day.$hour.$min."-".$model.$body_no;

                if(!is_dir($path)){
                    mkdir($path, 0777, TRUE);
                }else{
                    echo "Folder has already been created.";
                    return FALSE;
                }
            }

            for($i = 0; $i < count($files["tmp_name"]); $i++){
                $path_parts = pathinfo($files["name"][$i]);
                $dir = $path.$file_name."-".$i.".".$path_parts["extension"];
                $file_names[$i] = $file_name."-".$i.".".$path_parts["extension"];
                $paths[$i] = $path;
                if(!move_uploaded_file($files["tmp_name"][$i], $dir)){
                    echo "Something went wrong while uploading picture/s.";
                    return FALSE;
                }
            }

            return array($paths, $file_names);
        }

        function remove_files($path_N_names){
            for($i = 0; $i < count($path_N_names[0]); $i++){
                $path = $path_N_names[0][$i].$path_N_names[1][$i];
                unlink($path);
            }
            rmdir($path_N_names[0][0]);
        }

        function img_path_parser($str){
            $uid_len = 9;
            $date_len = 12;
            $model_len = 3;
            $body_len = 6;

            $parsed_str = array();

            $parsed_str["UID"] = substr($str, 0, $uid_len);
            
            $date = substr($str, 10, $date_len);
            $parsed_str["YEAR"] = substr($date, 0, 4);
            $parsed_str["MONTH"] = substr($date, 4, 2);

            $parsed_str["MODEL"] = substr($str, 23, $model_len);
            $parsed_str["BODY_NO"] = substr($str, 26, $body_len);

            $parsed_str["FOLDER"] = $parsed_str["UID"].'-'.$parsed_str["MODEL"].'-'.$parsed_str["BODY_NO"];
            $dir = $parsed_str["YEAR"].'/'.$parsed_str["MONTH"].'/'.$parsed_str["MODEL"].'/'.$parsed_str["FOLDER"].'/';

            return $dir;
        }

        function create_uid($last_uid, $house){
            if($last_uid == "N/A" && $house == "M"){
                $uid = "M00000001";
                return $uid;
            }else if($last_uid == "N/A" && $house == "O"){
                $uid = "O00000001";
                return $uid;
            }
            
            $increment_digit = strval((int)substr($last_uid["UID"],1) + 1);
            $str_rep = str_repeat("0", strlen($last_uid["UID"]) - strlen($increment_digit) - 1);

            $uid = $house.$str_rep.$increment_digit;

            return $uid;
        }

    }
?>