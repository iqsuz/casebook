<?php

class Security{
    public $error_msg = NULL;
    public $error_no = NULL;

    /*This function converts posted text to safe string in terms of html tag and blank space.*/
    function basic_validation($str){
        return trim(htmlspecialchars($str));
    }
    
    /*This function checks body no in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_seq($str){
        if(strlen($str) < 1  || strlen($str) > 4){
            echo "SEQ string length must be between 1-4 digits.";
            return FALSE;
        }
        if(!preg_match("/^[a-zA-Z0-9]{0,4}$/", $str)){
            $this->error_msg = "Seq is not in good shape! Please do not use restricted chars.";
            $this->error_no = 0;
            return FALSE;
        }

        return TRUE;
    }

    /*This function checks body no in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_body_no($str){
        if(strlen($str) != 6){
            echo "Body no must be exactly 6 chars.";
            return FALSE;
        }
        if(!preg_match("/^[0-9]{6}$/", $str)){
            $this->error_msg = "Please use only numbers for Body No.";
            $this->error_no = 0;
            return FALSE;
        }

        return TRUE;
    }

    /*This function checks part name in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_part_name($str){
        if(strlen($str) < 2 || strlen($str) > 20){
            echo "Part Name string must be between 2-20 chars.";
            return FALSE;
        }
        if(!preg_match("/^[a-zA-Z0-9- ]{2,20}$/", $str)){
            $this->error_msg = "Please do not use restricted chars for Part Name. It may contain letter, number, hypen and space.";
            $this->error_no = 1;
            return FALSE;
        }

        return TRUE;
    }

    /*This function checks part no in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_part_no($str){
        if(strlen($str) < 6 || strlen($str) > 20){
            echo "Part No string must be between 6-20 chars.";
            return FALSE;
        }
        if(!preg_match("/^[a-zA-Z0-9- ]{6,20}$/", $str)){
            $this->error_msg = "Please do not use restricted chars for Part No. It may contain letter, number, hypen and space.";
            $this->error_no = 1;
            return FALSE;
        }

        return TRUE;
    }

    /*This function checks occurrence place in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_o_place($str){
        if(strlen($str) < 2 || strlen($str) > 25){
            echo "Occurrence place string must be between 2-25 chars.";
            return FALSE;
        }
        if(!preg_match("/^[a-zA-Z0-9-_.\/ ]{2,25}$/", $str)){
            $this->error_msg = "Please do not use restricted chars for Occurrence Place. It may contain letter, number, hypen, underscore and space.";
            $this->error_no = 2;
            return FALSE;
        }

        return TRUE;
    }

    /*This function checks problem description in terms of special chars, length, if it contains html chars and white spaces.*/
    function check_problem_des($str){
        if(strlen($str) < 5 || strlen($str) > 65536){
            echo "Problem description string must be between 5-65536 chars.";
            return FALSE;
        }

        return TRUE;
    }

    function check_responsible($str){
        if(strlen($str) < 2 || strlen($str) > 20){
            echo "Responsible string must be between 2-20 chars.";
            return FALSE;
        }
        if(!preg_match("/^[a-zA-Z0-9-_.\/ ]{2,20}$/", $str)){
            $this->error_msg = "Please do not use restricted chars for Responsible. It may contain letter, number, hypen, underscore and space.";
            $this->error_no = 2;
            return FALSE;
        }

        return TRUE;
    }

    function check_files($files){
        if(count($files["name"]) === 0){
            echo "You must add picture/s.";
            return FALSE;
        }
        for($i = 0; $i < count($files["tmp_name"]); $i++){
            $verifyimg = getimagesize($files["tmp_name"][$i]);
            $pattern = "#^(image/)[^\s\n<]+$#i";

            if(!isset($verifyimg["mime"])){
                $this->error_msg = "Only image files are allowed!";
                $this->error_no = 4;
                return FALSE;
            }

            if(!preg_match($pattern, $verifyimg["mime"])){
                $this->error_msg = "Only image files are allowed!";
                $this->error_no = 4;
                return FALSE;
            }
        }

        return TRUE;
    }
}
