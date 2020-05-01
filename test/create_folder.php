<?php
    $datetime = date("Y-m-d H:i:s");
    $month = date("M",strtotime($datetime));
    echo $month;
    $year = date("Y");
    $model = "F3F";
    $body = "000001";
    $part_name = "ICU";

    $path = "../img/".$year."/".$month."/".$model.$body."-".$part_name;

        /*
    if(!is_dir($path)){
        mkdir($path, 0777, TRUE);
        echo $path;
    }
*/

?>